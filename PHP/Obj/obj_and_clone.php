<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/1
 * Time: 14:12
 */

namespace space2;


class obj_and_clone
{
    public function a(){
        echo '使用__clone()复制对象';
        echo '把一个对象赋给另一个变量，PHP5指向同一个对象';
        echo 'clone复制对象，会自动调用__clone()方法，clone这个方法中调用的属性应也是clone';
    }
}