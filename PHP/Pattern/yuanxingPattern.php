<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/15
 * Time: 10:51
 */
echo '
原型模式

抽象工厂模式：创建者和产品类，当产品类增加时，需要同时维护创建者和产品类，比较麻烦
就此引出原型模式

避免这种依赖关系，就是使用PHP的clone关键字来解决这种依赖关系，
使用原型模式，可以实现组合代替继承，促进了代码运行时候的灵活性，减少必须创建的类
当不需要平行的继承体系而需要最大化运行时的灵活性是，可使用抽象工厂模式的强大变形----原型模式

使用工厂方法模式或者使用抽象工厂模式，必须决定使用哪个具体的创建者，可以通过配置的值来决定
创建一个保存具体产品的工厂类，减少类的数量

';

class Sea {}
class EarthSea extends Sea {}
class MarsSea extends Sea {}
class Plains {}
class EarthPlains extends Plains {}
class MarsPlains extends  Plains {}
class Forest {}
class EarthForest extends Forest{}
class MarsForest extends Forest{}


