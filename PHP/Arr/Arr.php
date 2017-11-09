<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/21
 * Time: 14:25
 */
array_multisort($v1,SORT_ASC,$v2,SORT_DEST,$data);
$data[] = array('age'=>20,'weight'=>22,'height'=>24);
$data[] = array('age'=>20,'weight'=>26,'height'=>24);
$data[] = array('age'=>22,'weight'=>22,'height'=>28);
$data[] = array('age'=>20,'weight'=>24,'height'=>24);
$data[] = array('age'=>20,'weight'=>22,'height'=>30);
foreach($data as $k=>$v){
    $age[$k] = $v['age'];
    $weight[$k] = $v['weight'];
    $height[$k] = $v['height'];
}
$dd = array_multisort($age,SORT_ASC,$weight,SORT_DESC,$data);
var_dump($data);



sort($arr);
$arr = array('age' =>20 ,'age1'=>22,'age2'=>23,'age3'=>24 );
$data = sort($arr);
var_dump($arr);




asort($arr);



array_merge($arr1,$arr2);
$arr1 = array('name' => 'lisi',22 => 22 );
$arr2 = array('name1' => 'zhangsan',22 => 24);
$data = array_merge($arr1,$arr2);
var_dump($data);



array_unique($arr);
$arr = array('11' => 11,'22'=>22,'33'=>11 );
$data = array_unique($arr);
var_dump($data);



array_count_values($arr);
$arr = array('name1' => 'lisi','name2'=>'zhangsan','name3'=>'lisi' );
$data = array_count_values($arr);
var_dump($data);


count($arr);
$data[] = array('age'=>20,'weight'=>22,'height'=>24);
$data[] = array('age'=>20,'weight'=>26,'height'=>24);
$data[] = array('age'=>22,'weight'=>22,'height'=>28);
$data[] = array('age'=>20,'weight'=>24,'height'=>24);
$data[] = array('age'=>20,'weight'=>22,'height'=>30);
$data1 = count($data);
var_dump($data1);




array_map('func',$arr);
function get($n){
    return 2*$n;
}
$arr = array(2,3,4);
$data = array_map('func',$arr);
var_dump($data);



array_filter($arr,'func');
$arr = array(1,2,3,4,5);
function getResult($n){
    if($n !== 4){
        return true;
    }
}
$data = array_filter($arr,'getResult');
var_dump($data);



array_reduce($arr);
$arr = array(1,2,3,4,5);
function getInfo($m,$n){
    $m+=$n;
    return $m;
}
$data = array_reduce($arr,'getInfo');



array_diff($arr1,$arr2);
$arr1 = array(1,2,3,4,5);
$arr2 = array(2,3);
$data = array_diff($arr1,$arr2);
var_dump($data);


array_intersect($arr1,$arr2);
$arr1 = array(1,2,3,4,5);
$arr2 = array(2,3);
$data = array_intersect($arr1, $arr2);
var_dump($data);



array_combine($arr1,$arr2);
$arr1 = array('age','height','weight' );
$arr2 = array(11,22,33);
$data = array_combine($arr1,$arr2);
var_dump($data);


array_keys($arr,'val');
$arr = array('red','blue','red','blue');
$data = array_keys($arr,'blue');
var_dump($data);


array_values($arr);
$arr = array('name'=>'lisi','age'=>23,'weight'=>80);
$data = array_values($arr);
var_dump($data);



ksort($arr);


array_key_exists('key',$arr);
$arr = array('first'=>11,'second'=>22);
if(array_key_exists('first',$arr)){
    echo 'ok';
}


array_chunk($arr,int);
$arr = array(1,2,3,4,5,6);
$data = array_chunk($arr,2);
var_dump($data);



array_slice($arr,startInt,LengthInt);
$arr = array(1,2,3,4,5,6);
$data = array_slice($arr,1,2);
var_dump($data);



array_flip($arr);
$arr = array('name'=>'lisi','age'=>23);
$data = array_flip($arr);
var_dump($data);


shuffle($arr);
$arr = range(1,5);
shuffle($arr);
var_dump($arr);



json_encode($arr);
$arr = array('name'=>'lisi','age'=>23,'weight'=>80);
$data = json_encode($arr);
var_dump($data);



json_decode($str,bool);
$str = '{"name":"lisi","age":23}';
$data = json_decode($str,true);
var_dump($data);



array_reverse($arr);
$arr = array(11,22,33);
$data = array_reverse($arr);
var_dump($data);


array_search(value,$arr);
$arr = array(11,22,33);
$data = array_search(33,$arr);
var_dump($data);


array_splice($arr,startInt,lengthInt,newArr);
$arr = array('red','purple','green');
$data = array_splice($arr,1,1,'color');
var_dump($data);//返回的是要删除的 purple这个单元
var_dump($arr);//返回删除并替换后的数组


array_sum($arr);
$arr = array(11,22,33);
$data = array_sum($arr);
var_dump($data);







echo "

1、
2、sort($arr);索引重新开始， 从小到大排，返回布尔值
   $arr = array('age' =>20 ,'age1'=>22,'age2'=>23,'age3'=>24 );
    $data = sort($arr);
    var_dump($arr);
3、  asort($arr);保持索引关系排序，从小到大排
4、array_merge($arr1,$arr2);返回新的数组，两个数组的字符串键名重了，就会覆盖，而 数字键名就不会覆盖，会重新索引
   $arr1 = array('name' => 'lisi',22 => 22 );
    $arr2 = array('name1' => 'zhangsan',22 => 24);
    $data = array_merge($arr1,$arr2);
    var_dump($data);
5、array_unique($arr);除去数组中重复的值，取 前一个键名
   $arr = array('11' => 11,'22'=>22,'33'=>11 );
  $data = array_unique($arr);
  var_dump($data);
6、array_count_values($arr);返回新的数组，统计值出现的次数，以原始数组的值为键名，原始数组的值出现的次数 为值
   $arr = array('name1' => 'lisi','name2'=>'zhangsan','name3'=>'lisi' );
    $data = array_count_values($arr);
    var_dump($data);
7、count($arr);统计数组元素的个数，如果是二维数组，则统计外面的一维数组里的数组的个数
   返回值就是5
8、array_map('func',$arr);数组每个元素经回调处理后，返回新的数组，与原始数组的元素个数相同
   function get($n){
    return 2*$n;
  }
  $arr = array(2,3,4);
  $data = array_map('func',$arr);
  var_dump($data);
9、array_filter($arr,'func');循环数组，每个元素在回调函数中返回true了，才把这个元素放到新的数组中，保持索引进行过滤
   $arr = array(1,2,3,4,5);
    function get($n){
      if($n !== 4){
        return true;
      }
    }
    $data = array_filter($arr,'get');
    var_dump($data);
10、array_reduce($arr);返回经回调处理后的一个数
    $arr = array(1,2,3,4,5);
    function get($m,$n){
      $m+=$n;
      return $m;
    }
    $data = array_reduce($arr,'get');
    var_dump($data);
11、array_diff($arr1,$arr2);返回数组的差集的新数组.在$arr1中，但不在$arr2中。
    $arr1 = array(1,2,3,4,5);
    $arr2 = array(2,3);
    $data = array_diff($arr1,$arr2);
    var_dump($data);
12、array_intersect($arr1,$arr2);求数组的 交集， 在$arr1中，也在$arr2中。
    $arr1 = array(1,2,3,4,5);
    $arr2 = array(2,3);
    $data = array_intersect($arr1, $arr2);
    var_dump($data);
13、array_combine($arr1,$arr2);返回新的数组，新数组的键是$arr1的值，新数组的值是$arr2的值
    $arr1 = array('age','height','weight' );
    $arr2 = array(11,22,33);
    $data = array_combine($arr1,$arr2);
    var_dump($data);
14、array_keys($arr,'val');以新的 数组形式返回数组的所有键，或者数组形式返回val的所有键
    $arr = array('red','blue','red','blue');
    $data = array_keys($arr,'blue');
    var_dump($data);
15、array_values($arr);返回含所有值的索引数组
    $arr = array('name'=>'lisi','age'=>23,'weight'=>80);
    $data = array_values($arr);
    var_dump($data);
16、ksort($arr);对数组按键名排序
17、array_key_exists('key',$arr);返回布尔值，键是否在数组中
    $arr = array('first'=>11,'second'=>22);
    if(array_key_exists('first',$arr)){
    	echo 'ok';
    }
18、array_chunk($arr,int);返回新的数组，切割的每个小的数组的元素个数为int
     $arr = array(1,2,3,4,5,6);
    $data = array_chunk($arr,2);
    var_dump($data);
19、array_slice($arr,startInt,LengthInt);返回数组中的一段，开始位置和长度
   $arr = array(1,2,3,4,5,6);
    $data = array_slice($arr,1,2);
    var_dump($data);
20、array_flip($arr);交换数组的键和值
   $arr = array('name'=>'lisi','age'=>23);
   $data = array_flip($arr);
   var_dump($data);
21、shuffle($arr);返回布尔值，只是进行的操作
   $arr = range(1,5);
    shuffle($arr);
  var_dump($arr);
22、json_encode($arr);编码成功返回json编码的字符串

23、

25、array_diff_assoc($arr1,$arr2);带索引计算两个数组的差集，索引不一致，也不行该数组包括了所有在 array1 中但是不在任何其它参数数组中的值。注意和 array_diff()  不同的是键名也用于比较
26、array_diff_key($arr1,$arr2);使用键名比较差集，根据 array1 中的键名和 array2 进行比较，返回不同键名的项。跟array_diff();相同，比较的内容不同













";