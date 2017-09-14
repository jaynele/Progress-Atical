<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/29
 * Time: 12:34
 */

namespace space2;


class obj_and_func
{
    public function a(){
        echo '类中方法';
        echo '属性可以让对象存储数据，方法可以让对象执行任务';
        echo '方法 public protected private ，public 下可以在对象外调用方法'
        echo '对象 方法名小驼峰 圆括号'
        echo '类中$this 最后被当前实例替代';
        echo '创建构造方法，对象new时只用传参，自动调用 __construct()';
    }
}