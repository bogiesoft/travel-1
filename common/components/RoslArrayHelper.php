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
}