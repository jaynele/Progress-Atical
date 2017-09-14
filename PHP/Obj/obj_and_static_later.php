<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/31
 * Time: 18:16
 */

namespace space2;


class obj_and_static_later
{
    public function a(){
        echo '延迟静态绑定';
        echo 'new self();当前对象   new static();延迟对象    static::a();延迟调用a()方法      ';
    }
}