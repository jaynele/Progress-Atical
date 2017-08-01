<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/1
 * Time: 9:10
 */

namespace space2;


class obj_and_overload
{
    public function a(){
        echo '使用拦截器又叫重载';
        echo '__set() __get() __isset() __unset() __call()';
        echo '访问未定义的属性调用，给未定义属性赋值被调用，对未定义的属性调用isset时被调用，对未定义的属性调用unset时被调用，调用未定义的方法时被调用';
        echo '访问未定义的属性，__get()被调用，get+调用的属性名，组合为新的方法名，method_exist()，判断对象的方法是否存在，如果存在就调用';
        echo '__call()调用未定义的方法';
    }
}