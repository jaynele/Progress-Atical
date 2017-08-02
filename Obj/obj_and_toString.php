<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/2
 * Time: 10:23
 */

namespace space2;


class obj_and_toString
{
    public function a(){
        echo '__toString()';
        echo '打印对象时候，提示信息直接可以调用__toString()这个方法';
        echo '对于日志和错误报告非常有用';
        echo '比如Exception类可以把异常信息写到__toString()方法中';
    }
}