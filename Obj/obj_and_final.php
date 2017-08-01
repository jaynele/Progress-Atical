<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/1
 * Time: 8:56
 */

namespace space2;


class obj_and_final
{
    public function a(){
        echo 'final类，final方法';
        echo 'final类不能被继承，final方法不能被覆写';
        echo '修改起来很麻烦，慎用final';
    }
}