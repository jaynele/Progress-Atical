<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/29
 * Time: 13:25
 */

namespace space2;


class obj_and_class_extends
{
    public function a()
    {
        echo '类的继承';
        echo '一个基类得到多个派生类';
        echo '基类放共有内容，子类放特有内容';
        echo '子类会调用父类的构造方法，继承父类的public protected,没有继承private方法和属性';
        echo '对象 instanceof 类名，表示对象是右面的类型，返回布尔';
        echo '构造方法的继承：如下：';
        echo '调用被覆写的方法用parent关键字';
        echo '任何类中都可以访问public,当前类和子类中可以访问protected，当前类中访问用private';
    }

    public function __construct($a, $b, $c)
    {
        public $c;
        parent::__construct($a, $b);
        $this->c = $c;
    }
}