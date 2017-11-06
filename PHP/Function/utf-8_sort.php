<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/11/6
 * Time: 16:39
 */

function utf8_array_asort(&$array) {
    if(!isset($array) || !is_array($array)) {
        return false;
    }
    foreach($array as $k=>$v) {
        $array[$k] = iconv('UTF-8', 'GB2312',$v);
    }
    asort($array);
    foreach($array as $k=>$v) {
        $array[$k] = iconv('GB2312', 'UTF-8', $v);
    }
    return true;
}