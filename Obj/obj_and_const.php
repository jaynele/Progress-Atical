<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/30
 * Time: 11:07
 */

namespace space2;


class obj_and_const
{
    public function a()
    {
        echo '常量const';
        echo '不用美元，用大写字母来声明，只能是基本类型的值，不能把对象赋给常量，只能通过类而不能通过实例对象访问常量';
        echo '当需要所有实例都访问，并且属性值不改变时候应该使用常量';
    }
}