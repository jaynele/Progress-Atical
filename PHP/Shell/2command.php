<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/11/1
 * Time: 14:06
 */
//$argc  为参数个数 ，因为脚本名称总是作为第一个参数，所以$argc的最小值为1
//$argv 为参数数组 ，第一个参数为脚本名称，其他参数为传给脚本的参数
//如 php  a.php arg1 arg2
$argc = 3 ;
$argv[0] = "a.php";
$argv[1] = "arg1";
$argv[2] = "arg2";