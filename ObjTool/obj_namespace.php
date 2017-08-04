<?php

/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/2
 * Time: 18:06
 */
namespace obj_tool;
class obj_namespace
{
    public function a(){
        echo '操作对象和类的工具，系统的一部分与另一部分分隔开用到NameSpace';
        echo '一些程序语言中用到包，但是PHP并没有包，用到命名空间';
        echo '类名越来越长，可读性差，防止包名重复';
        echo '在命名空间内，任意使用其中的类函数变量等';
        echo '命名空间之外必须导入或引用命名空间，才能访问它所包含的项 namespace obj_tool;namespace oo\oo;层次更深的命名空间';
        echo '命名空间内部调用方法，直接类名加方法调用，在空间外的另一个空间访问：可以前面加根\再加访问的空间名再访问类名和方法来调用，还可以用关键字use';
        echo '用关键字use关键字来访问其他空间，导入整个类，as子句重命名类名，本空间里用重命名类静态调用方法';
        echo '此外调用全局空间的类方法，在另个命名空间里可以用根\来调用类方法';
        echo '__NAMESPACE__常量输出的是当前所在的命名空间';
        echo '一个文件定义多个命名空间，更推荐一个文件用一个命名空间';
    }
}