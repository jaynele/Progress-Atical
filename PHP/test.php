<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/13
 * Time: 14:36
 */
function myTest()
{
    static $x = 0;
    echo $x;
    $x++;
}
myTest();
myTest();
myTest();
