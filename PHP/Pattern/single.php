<?php

/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/14
 * Time: 9:15
 * content:生成仅生成一个对象,通过一个类，或类中一个方法来产生对象
 */
abstract class Explomm
{
    protected $name;
    protected $arrName = array('Minis', 'MMinis', 'MMMinis');

    public function __construct($name)
    {
        $this->name = $name;
    }

    function recuire($name)
    {
        $num       = count($this->arrName) - 1;
        $num       = rand(1, $num);
        $className = $this->arrName[$num];
        return new $className($name);
    }

    abstract function fire();
}

class Minis extends Explomm
{
    public function fire()
    {
        echo $this->name . ':go <br />';
    }
}

class MMinis extends Explomm
{
    public function fire()
    {
        echo $this->name . 'hello <br />';
    }
}

class MMMinis extends Explomm
{
    public function fire()
    {
        echo $this->name . 'back <br />';
    }
}

class Exe
{
    protected $arr = array();

    public function add(Explomm $explomm)
    {
        $this->arr[] = $explomm;
    }

    public function read()
    {
        if (count($this->arr) > 0) {
            $objMM = array_pop($this->arr);
            $objMM->fire();
        }
    }
}

$objExe = new Exe();
$objExe->add(new Minis('aa'));
$objExe->add(new MMinis('bb'));
$objExe->add(new MMMinis('cc'));
$objExe->read();
$objExe->read();
$objExe->read();

