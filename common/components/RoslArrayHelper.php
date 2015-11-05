<?php

namespace yii\helpers;

class RoslArrayHelper extends BaseArrayHelper
{
    public static function arraySingle($array) {
        if (!is_array($array)) {
            return FALSE;
        }
        $result = array();
        foreach ($array as $key => $value) {
            $result[] = $value;
        }
        return $result;
    }

    public static function getRusDate($datetime) {
        $yy = (int) substr($datetime,0,4);
        $mm = (int) substr($datetime,5,2);
        $dd = (int) substr($datetime,8,2);

        $hours = substr($datetime,11,5);

        $month =  array ('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');

        return ($dd > 0 ? $dd . " " : '') . $month[$mm - 1]." ".$yy." г. " . $hours;
    }
}