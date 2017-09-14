<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/4
 * Time: 10:49
 */

namespace obj_tool;


class obj_and_pear
{
    public function a()
    {
        echo '包管理pear，注意类名的写法，文件系统命名';
        echo '在require include 没有正常作用，然后会用服务器的include_path路径';
        echo 'set_include_path来设置加载路径，get_include_path获取服务器已经设定的路径';
        echo '一个文件一个类便于管理';
        echo '类文件文件名是类名，pear命名规则文件名是类名，但是类名是包含路径的';
        echo '拦截器__autoload()方法，当实例化不存在的类时，调用它，类名以字符串形式作为参数传递给它';
    }
}