<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/15
 * Time: 15:16
 */


echo '
组合模式：   将继承用于组合的最极端的例子
设计思想简单，而且优雅，但是过度用，也有弊端

组合模式：将一组对象组合为可像单个对象使用的结构
装饰模式：合并对象来扩展功能
外观模式：给复杂的系统创建一个简单的接口

组合模式：将继承用于组合的最极端的例子
一个独立对象和一个组合对象基本没有差别，模式简单，但是还是容易迷惑
容易迷惑的原因就是，类的结构和对象的结构特别相似
组合模式中，继承结构是树结构
有助于集合和组件之间的关系建立模型

添加对象添加整个类
类和对象的管理

组合对象和局部对象
局部对象可以实现功能的操作
局部对象和组合对象公用一个接口






';

class Army
{
    private $arr = array();

    public function unit($unit)
    {
        array_push($this->arr, $unit);
    }

    public function getUnit()
    {
        $res = 0;
        foreach ($this->arr as $k=>$v) {
            $res += $v->getRes();
        }
        return $res;
    }
}