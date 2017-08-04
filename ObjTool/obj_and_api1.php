<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/4
 * Time: 15:03
 */

namespace obj_tool;


class obj_and_api
{
    public function a()
    {
        echo '反射API部分类';
        echo 'Reflection 为类的摘要信息提供静态函数';
        echo 'ReflectionClass 类信息和工具';
        echo 'ReflectionMethod 方法信息和工具';
        echo 'ReflectionProperty 类属性信息';
        echo 'ReflectionParameter 方法参数信息';
        echo 'ReflectionFunction 函数信息和工具';
        echo 'ReflectionExtension PHP扩展信息';
        echo 'ReflectionException 错误类';
    }

    public function buseness()
    {
        $objReflection = new \ReflectionClass('className');
        \Reflection::export($objReflection);
        echo 'export输出类中所有信息';
        echo 'print_r检测PHP数据的工具，Reflection是检测类和函数的工具';
        $objReflection->getName();'获取检查的类名';
        $objReflection->isUserDefined();'获取类是否已经定义';
        $objReflection->isInternal();'检测类是否是内置类';
        $objReflection->isAbstract();'检测类是否是抽象的';
        $objReflection->isInterface();'检测类是否为接口';
        $objReflection->isInstantiable();'检测类是否可实例化';
        $objReflection->getFileName();'得到类文件的绝对路径';
        $lines = file($objReflection->getFileName());//file()函数获取所有行组成的数组
        $start = $objReflection->getStartLine();'类文件开始的行号';
        $end = $objReflection->getEndLine();'类文件结束的行号';
        implode(array_slice($lines,$start-1;$end));

        $objReflection->getMethods();'获取检测类中所有方法对象直接用ReflectionMethod';

    }
}



