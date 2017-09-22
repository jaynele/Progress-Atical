<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/14
 * Time: 15:56
 */
echo '
抽象类高于实现
尽量一般化而不特殊化
工厂模式关注  抽象类型时候，如何实例化对象    的问题
用特定的类来实例化对象

个人事务管理，管理对象
创建对象1，然后用另一个对象2来处理这个对象
但是怎么获取这个另一个对象2呢
直接把对象2传递给对象1，
在对象1中使用条件语句来用对象2中的方法

但是上面的条件语句常常被当做坏的‘代码味道’的象征

要解决的问题：
在代码运行时才知道要生成的对象类型
需要能特别轻松加入一些对象2
每一个对象2都可以定制特定的功能

工厂方法模式把创建者类和要生产的产品类分离开
创建者是一个工厂类，定义了用于生成产品对象的类方法，如果没有提供实现，那么就由创建类的子类来实现
一般情况下，是创建者类的子类实例化一个相应的产品子类

结果：
工厂方法模式中可以看到：创建类和产品类层次结构特别像，形成了一中特殊的代码重复，然后让人不舒服
为创建者类创建子类的原因是为了实现工厂方法模式，产生产品子类对象，然后就需要再考虑一下

所以：工厂方法模式和抽象工厂模式经常放一起使用


';

abstract class CommonManager
{
    abstract function getHeaderManager();

    abstract function getObjCoder();

    abstract function getFooterManager();
}

class Manager extends CommonManager
{
    function getHeaderManager()
    {
        return 'header';
    }

    function getObjCoder()
    {
        return new Coder();
    }

    function getFooterManager()
    {
        return 'footer';
    }
}

abstract class CommonCoder
{
    abstract function blog();
}

class Coder extends CommonCoder
{
    function blog()
    {
        return 'coder';
    }
}