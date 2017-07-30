<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/30
 * Time: 11:15
 */

namespace space2;


class obj_and_abstract
{
    public function a()
    {
        echo '抽象类abstract';
        echo '抽象类至少有一个抽象方法';
        echo '抽象类子类必须完整每个抽象方法，抽象子类可以不用';
        echo '抽象类子类访问控制不能比抽象类更严格，方法参数个数应一致';
    }
}