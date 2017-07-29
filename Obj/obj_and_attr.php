<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/29
 * Time: 12:15
 */

namespace space2;


class obj_and_attr
{
    public function a(){
        echo '类中属性';
        echo '属性作用域 public protected private';
        echo '属性public 对象外部访问 $obj->title = 1 设置属性值 替换掉类中属性默认值 属性尽量设置成受保护的 因为动态设置属性是坏习惯';
        echo '属性可以让对象存储数据，但是方法可以让对象执行任务，方法是类中声明的特殊函数';
    }
}