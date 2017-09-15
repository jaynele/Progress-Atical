<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/14
 * Time: 14:10
 * content:单例模式
 */
echo '
全局变量是出现bug的原因之一，使类处于一定的环境里，破坏了封装性，无法直接提取出来利用，
一般通过方法调用来访问某个对象，
利用类中一个方法来返回一个对象，
一：被系统中任何对象使用

二：不应该存在会被覆写的变量中

三：系统中不超过一个这样的对象

强制控制对象的实例化
创建一个无法从自身类外部来创建实例的类
构造方法私有

使用单例与使用全局变量相比
单例在系统中任何地方都能使用
改变一个单例就可能全部都要改变
使用单例，就是使用了依赖关系
单例是对全局变量的改进
而且避免了命名空间的依赖
避免传递不必要的对象

';




class Test
{
    private static $getInstance;

    private function __construct()
    {
    }

    public static function getIns()
    {
        if (empty(self::$getInstance)) {
            self::$getInstance = new Test();
        }
        return self::$getInstance;
    }
}

var_dump(Test::getIns());