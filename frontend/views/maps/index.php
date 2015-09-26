<?php frontend\assets\AngularAsset::register($this);

$this->title = 'Карты';
$this->params['sidebarType'] = -1;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/maps/']];
?>
<style>
    .angular-google-map-container { height: 100vh; }
    .map-block img {
        width: auto;
        vertical-align: top;
        float: left;
    }
</style>
<div class="maps" ng-app="maps">
    <div class="container" ng-controller="MapsController">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title">
                    Карты
                </h3>
            </div>  <!--main-content__heading-->
            <div class="maps__filter hidden-sm hidden-xs clearfix" ng-cloak>
                <label>Выберите страну<select ng-change="citySelect = ''" class="selectpicker common-button common-button--thin" ng-model="countrySelect">

                        <option ng-repeat="country in countries" ng-value="{{country.id}}" ng-cloak>{{country.title_ru}}</option>

                    </select></label>
                <label>Город<select class="selectpicker common-button common-button--thin" ng-model="citySelect">

                        <option ng-repeat="city in cities | filter: {country_id: countrySelect}" ng-value="{{city.id}}" ng-cloak>{{city.title_ru}}</option>


                    </select></label>
            </div>
            <div class="map-block row" ng-cloak>
                <div class="map-block__frame">

                    <ui-gmap-google-map
                        center='map.center'
                        zoom='3'
                        options="{scrollwheel:false}">

                        <ui-gmap-marker ng-repeat="marker in markers | filter: {country: countrySelect, city: citySelect}" idkey="$index" coords="marker.latlng" ng-click="windowVisible[$index] = !windowVisible[$index]">
                            <ui-gmap-window options="{visible:windowVisible[$index]}" closeClick="windowVisible[$index] = false">
                                <div class="info" ng-cloak>
                                    <img width="150" ng-src="{{marker.image}}" alt="">
                                    <span>{{marker.content_ru}}</span>
                                </div>
                            </ui-gmap-window>
                        </ui-gmap-marker>

                    </ui-gmap-google-map>

                </div>
                <div ng-show="citySelect" class="map-block__desc" ng-repeat="city in cities | filter: {id: citySelect}">
                    <h3 class="title">{{city.title_ru}}</h3>
                    <div ng-bind-html="city.description_ru"></div>
                </div>
                <div ng-show="countrySelect" class="map-block__desc" ng-repeat="country in countries | filter: {id: countrySelect}">
                    <h3 class="title">{{country.title_ru}}</h3>
                    <div ng-bind-html="country.description_ru"></div>
                </div>
            </div>
        </div>
    </div>
</div>  <!--web-cams-page-->
