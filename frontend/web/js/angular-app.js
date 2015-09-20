var maps = angular.module('maps', ['uiGmapgoogle-maps','ngSanitize']);

maps.controller('MapsController', function($scope, $http, $filter){
    $scope.markers = [];
    $scope.map = { center: { latitude: 45, longitude: -73 }, zoom: 8 };
    $http.get('/maps/markers').success(function(response) {
        $scope.markers = response;
    });

    $http.get('/maps/locations').success(function(response) {
        $scope.cities = response.cities;
        $scope.countries = response.countries;
    });

    $scope.explodeCoords = function(string) {
        var delimiter = ',';
        var arr =  string.toString().split ( delimiter.toString() );
        return {latitude: arr[1], longitude: arr[0]};
    }
}).filter('to_trusted', ['$sce', function($sce){
    return function(text) {
        return $sce.trustAsHtml(text);
    };
}]);