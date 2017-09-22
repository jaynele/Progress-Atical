<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/15
 * Time: 15:16
 */


echo '
组合啊模式：   将继承用于组合啊的最极端的例子
设计思想简单，而且优雅，但是过度用，也有弊端

组合啊模式：将一组对象组合啊为可像单个对象使用的结构
装饰模式：合并对象来扩展功能
外观模式：给复杂的系统创建一个简单的接口

组合啊模式：将继承用于组合啊的最极端的例子
一个独立对象和一个组合啊对象基本没有差别，模式简单，但是还是容易迷惑
容易迷惑的原因就是，类的结构和对象的结构特别相似
组合啊模式中，继承结构是树结构
有助于集合和组件之间的关系建立模型

添加对象添加整个类
类和对象的管理

组合啊啊对象和局部对象
局部对象可以实现功能的操作
局部对象和组合啊啊对象公用一个接口

局部对象可互换的情况，适合用组合啊模式
如果想对待单对象一样对待组合啊对象那么特别适合这种组合啊模式





装饰模式使用组合啊和委托，不单单使用继承
装饰模式中所有的对象都继承自同一个父类
一个抽象基类，一个具体组件，一个抽象装饰类
装饰器模式尽可能使基类中方法尽可能少


外观模式：
不仅在系统中有用，提供一个接口，隐藏内部也要能使用
但是哪部分显示，哪部分被隐藏，需要分析
应该提前把系统做好分层，数据库层，应用层，视图层类似这样的
找共同的部分，并做好分层，分层的部分独立开
为一个分层或者一个子系统开放一个单一的入口

组合啊模式，装饰模式，外观模式都是很好得结合组合啊和继承，使用继承是为了更好的组合啊对象。


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
        foreach ($this->arr as $k => $v) {
            $res += $v->getRes();
        }
        return $res;
    }
}

function testNum($num)
{
    $arr = array();

    for ($num; $num > 0; $num--) {
        $str = "$num";
        $len = strlen($num);
        $mid = intval($len / 2) + 1;

        for ($i = 0; $i < ($mid - 1); $i++) {
            if (intval(substr($str, $i, 1)) == intval(substr($str, ($len - 1 - $i), 1))) {
                array_push($arr, $num);
            }
        }
    }

    return $arr;
}

function testNums($num)
{
    $arr = array();

    for ($num; $num > 0; $num--) {
        $str = "$num";
        $len = strlen($num);
        $mid = intval($len / 2) + 1;
        $j   = 0;
        for ($i = 0; $i < ($mid - 1); $i++) {
            if (intval(substr($str, $i, 1)) == intval(substr($str, ($len - 1 - $i), 1))) {
                $j = $j + 1;
            }
        }
        if ($j == ($mid - 1)) {
            array_push($arr, $num);
        }
    }

    return $arr;
}

var_dump(testNum(10000));



