<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/1
 * Time: 13:55
 */

namespace space2;


class obj_and_construct
{
    public function a(){
        echo '__construct()　__destruct()';
        echo '实例化对象自动加载，从内存中清楚对象前，做最后的数据处理工作';
        echo '魔法方法慎用，不要过于信赖';
    }
}