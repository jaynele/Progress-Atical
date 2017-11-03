<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/21
 * Time: 14:25
 */
echo "

1、array_multisort($v1,SORT_ASC,$v2,SORT_DEST,$data);
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
    $data[] = array('age'=>20,'weight'=>22,'height'=>24);
    $data[] = array('age'=>20,'weight'=>26,'height'=>24);
    $data[] = array('age'=>22,'weight'=>22,'height'=>28);
    $data[] = array('age'=>20,'weight'=>24,'height'=>24);
    $data[] = array('age'=>20,'weight'=>22,'height'=>30);
    $data1 = count($data);
    var_dump($data1);  返回值就是5
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
    $arr = array('name'=>'lisi','age'=>23,'weight'=>80);
    $data = json_encode($arr);
    var_dump($data);返回值为string(36) "{"name":"lisi","age":23,"weight":80}"
23、json_decode($str,bool);对json格式进行编码， 如果第二个参数为true， 返回数组，否则返回 object
    $str = '{"name":"lisi","age":23}';
    $data = json_decode($str,true);
    var_dump($data);返回php的数组形式
24、array_column($input,$column_key,$index_key);
    返回input数组中键值为column_key的列， 如果指定了可选参数index_key，那么input数组中的这一列的值将作为返回数组中对应值的键。
    以数组形式，可以 值的形式返回，如果指定第三个参数也可以键的形式返回
    以数据库表文件 为例；
  $data[] = array('age'=>20,'weight'=>22,'height'=>24,'id'=>11);
  $data[] = array('age'=>20,'weight'=>26,'height'=>24,'id'=>22);
  $data[] = array('age'=>22,'weight'=>22,'height'=>28,'id'=>33);
  $data[] = array('age'=>20,'weight'=>24,'height'=>24,'id'=>44);
  $data[] = array('age'=>20,'weight'=>22,'height'=>30,'id'=>55);
  $arr = array_column($data,'weight','id');//以id为键，weight一列为值，返回数组
  var_dump($arr);
25、array_diff_assoc($arr1,$arr2);带索引计算两个数组的差集，索引不一致，也不行该数组包括了所有在 array1 中但是不在任何其它参数数组中的值。注意和 array_diff()  不同的是键名也用于比较
26、array_diff_key($arr1,$arr2);使用键名比较差集，根据 array1 中的键名和 array2 进行比较，返回不同键名的项。跟array_diff();相同，比较的内容不同
27、array_fill(start_index,num,value);用 value 参数的值将一个数组填充 num 个条目，键名由 start_index 参数指定的开始。
    $arr = array_fill(2,3,'red');
    var_dump($arr);返回array(3) { [2]=> string(3) "red" [3]=> string(3) "red" [4]=> string(3) "red" }
28、array_fill_keys($keys,value);使用 value 参数的值作为值，使用 keys 数组的值作为键来填充一个数组。
    $keys = array('name','age','weight');
    $data = array_fill_keys($keys,15);
    var_dump($data);
29、array_intersect_assoc($arr1,$arr2);带索引地 求交集
30、array_intersect_keys($arr1,$arr2);根据键名求交集
31、array_pad($arr,length,value);用value将$arr填充到length指定的长度返回 input 的一个拷贝，并用 pad_value 将其
    填补到 pad_size 指定的长度。如果 pad_size 为正，则填补到数组的右侧，如果为负则从左侧开始填补。如果 pad_size 的绝对值小
    于或等于 input 数组的长度则没有任何填补。有可能一次最多填补 1048576 个单元。
    $arr = array(1,2,3);
    $data = array_pad($arr,5,4);
    var_dump($data);
32、array_product($arr);返回一个数值，求数组中所有值的乘积
    $arr = array(2,3,4,5);
    $data = array_product($arr);
    var_dump($data);
33、rand(1,6);产生1-6的一个随机数
    echo rand(1,6);
34、array_replace($arr1,$arr2);函数使用后面数组元素的值替换第一个 array 数组的值。如果一个键存在于第一个数组同时也存在于第二个
    数组，它的值将被第二个数组中的值替换。如果一个键存在于第二个数组，但是不存在于第一个数组，则会在第一个数组中创建这个元素。如果一
    个键仅存在于第一个数组，它将保持不变。如果传递了多个替换数组，它们将被按顺序依次处理，后面的数组将覆盖之前的值。
    $arr1 = array('name'=>'lisi','age'=>23);
    $arr2 = array('name'=>'zhangsan','age1'=>24);
    $data = array_replace($arr1,$arr2);
    var_dump($data);
35、array_rand($arr,num);随机取数组的num个单元的键名，这些键名以新的数组形式返回
    $arr = array('name'=>'lisi','age'=>23,'weight'=>80,'height'=>90);
    $data = array_rand($arr,2);
    var_dump($data);
36、array_reverse($arr) 返 回一个单元顺序相反的数组
    $arr = array(11,22,33);
    $data = array_reverse($arr);
    var_dump($data);
37、array_search(value,$arr);在$arr中搜索value,如果存在，返回value对应的键名
    $arr = array(11,22,33);
    $data = array_search(33,$arr);
    var_dump($data);搜索到返回的是一个值对应的键名，搜索不到返回false
38、array_splice($arr,startInt,lengthInt,newArr);返回的是要删去的单元，把 input 数组中由 offset 和 length 指定的单元去掉，如果提
     供了 replacement 参数，则用其中的单元取代。 startInt 当前的元素不删除
    注意 input 中的数字键名不被保留。
    $arr = array('red','purple','green');
    $data = array_splice($arr,1,1,'color');
    var_dump($data);//返回的是要删除的 purple这个单元
    var_dump($arr);//返回删除并替换后的数组
39、array_sum($arr);返回一个数组所有单元的和
    $arr = array(11,22,33);
    $data = array_sum($arr);
    var_dump($data);











";