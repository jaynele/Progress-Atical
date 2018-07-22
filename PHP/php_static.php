<?php 
echo '1/<p>Static 作用域 当一个函数完成时，它的所有变量通常都会被删除。然而，有时候您希望某个局部变量不要被删除。
要做到这一点，请在您第一次声明变量时使用 static 关键字</p>';

function myTest()
{
    static $x=0;
    echo $x;
    $x++;
}
 
myTest();
myTest();
myTest();


echo '2/<p>global关键字</p>';

$x=5;
$y=10;
 
function myTest()
{
    global $x,$y;
    $y=$x+$y;
}
 
myTest();
echo $y; // 输出 15


echo 'global 关键字用于函数内访问全局变量。
在函数内调用函数外定义的全局变量，我们需要在函数中的变量前加上 global 关键字：';
echo 'PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。
index 保存变量的名称。这个数组可以在函数内部访问，也可以直接用来更新全局变量。';

$x=5;
$y=10;
 
function myTessst()
{
    $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
}

myTessst();
echo $y;