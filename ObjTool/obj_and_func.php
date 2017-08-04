<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/4
 * Time: 14:15
 */

namespace obj_tool;


class obj_and_func
{
    public function a()
    {
        echo '类函数和对象函数';
        echo 'class_exists file_exists ';
        echo 'get_class() 接收对象作为参数，获取对象的类';
        echo 'instanceof操作符 左边是待检测的对象，右边是类名，如果检测是对象是给定的类的实例返回true';
        echo 'get_class_methods()参数是一个类名，获取一个类中所有public方法的列表';
        echo 'method_exists 参数一个对象，一个方法名';
        echo 'get_class_vars()返回类中所有属性为一个关联数组，键名为属性名，键值为属性值';
        echo 'get_parent_class()得到类的父类名字，对象或者类作为参数，';
        echo 'is_subclass_of(),第二个参数是第一个参数的父类返回true，类的继承关系';
        echo 'class_implements()返回由接口名构成的数组';
    }
}