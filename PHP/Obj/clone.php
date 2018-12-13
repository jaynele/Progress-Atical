使用__clone()复制对象
把一个对象赋给另一个变量
clone复制对象，会自动调用__clone()方法，clone这个方法中调用的属性应也是clone

浅克隆 只是克隆对象中的非对象非资源数据，即对象中属性存储的是对象类型，则会出现克隆不完全
<?php
class B{
 public $val = 10;
}
class A{
 public $val = 20;
 public $b;
 public function __construct(){
  $this->b = new B();
 }
}

$obj_a = new A();
$obj_b = clone $obj_a;
$obj_a->val = 30;
$obj_a->b->val = 40;
var_dump($obj_a);
echo '<br>';
var_dump($obj_b);

object(A)[1]
 public 'val' => int 30
 public 'b' => 
 object(B)[2]
  public 'val' => int 40
 
object(A)[3]
 public 'val' => int 20
 public 'b' => 
 object(B)[2]
  public 'val' => int 40
    
    
深克隆    一个对象的所有属性数据都彻底的复制，需要使用魔术方法__clone()，并在里面实现深度克隆
    
 <?php
class B{
 public $val = 10;
}
class A{
 public $val = 20;
 public $b;
 public function __construct(){
  $this->b = new B();
 }
 public function __clone(){
  $this->b = clone $this->b;
 }
}

$obj_a = new A();
$obj_b = clone $obj_a;
$obj_a->val = 30;
$obj_a->b->val = 40;
var_dump($obj_a);
echo '<br>';
var_dump($obj_b);

object(A)[1]
 public 'val' => int 30
 public 'b' => 
 object(B)[2]
  public 'val' => int 40
 
object(A)[3]
 public 'val' => int 20
 public 'b' => 
 object(B)[4]
  public 'val' => int 10
