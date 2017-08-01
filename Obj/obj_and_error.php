<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/31
 * Time: 18:24
 */

namespace space2;


class obj_and_fatal_error
{
    public function a(){
        echo 'PHP内置的Exception类   错误处理，响应错误条件，设计处理错误的方法';
        echo 'throw关键字和Exception类对象来抛出异常';
        echo '不停地检查错误，用正确的代码响应错误';
        echo '调用可能会抛出异常的方法，可以把调用方法放在try语句中，try后面至少跟一个catch语句来处理错误';
        echo '抛出异常，catch语句被调用';
    }
}