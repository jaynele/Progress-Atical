<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/4
 * Time: 10:28
 */

namespace obj_tool;


class obj_file
{
    public function a(){
        echo 'require_once(),include_once()';
        echo '区别就是处理错误的方式不同，require遇到错误会停止整个程序，include会停止调用的方法跳出继续执行后面的程序';
        echo 'require适用于加载库文件比较安全，include适用于加载模板文件';
        echo 'require是语句而不是函数，可以去掉括号来写';
    }
}