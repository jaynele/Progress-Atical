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
var_dump($data);//���ص���Ҫɾ���� purple�����Ԫ
var_dump($arr);//����ɾ�����滻�������


array_sum($arr);
$arr = array(11,22,33);
$data = array_sum($arr);
var_dump($data);







echo "

1��
2��sort($arr);�������¿�ʼ�� ��С�����ţ����ز���ֵ
   $arr = array('age' =>20 ,'age1'=>22,'age2'=>23,'age3'=>24 );
    $data = sort($arr);
    var_dump($arr);
3��  asort($arr);����������ϵ���򣬴�С������
4��array_merge($arr1,$arr2);�����µ����飬����������ַ����������ˣ��ͻḲ�ǣ��� ���ּ����Ͳ��Ḳ�ǣ�����������
   $arr1 = array('name' => 'lisi',22 => 22 );
    $arr2 = array('name1' => 'zhangsan',22 => 24);
    $data = array_merge($arr1,$arr2);
    var_dump($data);
5��array_unique($arr);��ȥ�������ظ���ֵ��ȡ ǰһ������
   $arr = array('11' => 11,'22'=>22,'33'=>11 );
  $data = array_unique($arr);
  var_dump($data);
6��array_count_values($arr);�����µ����飬ͳ��ֵ���ֵĴ�������ԭʼ�����ֵΪ������ԭʼ�����ֵ���ֵĴ��� Ϊֵ
   $arr = array('name1' => 'lisi','name2'=>'zhangsan','name3'=>'lisi' );
    $data = array_count_values($arr);
    var_dump($data);
7��count($arr);ͳ������Ԫ�صĸ���������Ƕ�ά���飬��ͳ�������һά�����������ĸ���
   ����ֵ����5
8��array_map('func',$arr);����ÿ��Ԫ�ؾ��ص�����󣬷����µ����飬��ԭʼ�����Ԫ�ظ�����ͬ
   function get($n){
    return 2*$n;
  }
  $arr = array(2,3,4);
  $data = array_map('func',$arr);
  var_dump($data);
9��array_filter($arr,'func');ѭ�����飬ÿ��Ԫ���ڻص������з���true�ˣ��Ű����Ԫ�طŵ��µ������У������������й���
   $arr = array(1,2,3,4,5);
    function get($n){
      if($n !== 4){
        return true;
      }
    }
    $data = array_filter($arr,'get');
    var_dump($data);
10��array_reduce($arr);���ؾ��ص�������һ����
    $arr = array(1,2,3,4,5);
    function get($m,$n){
      $m+=$n;
      return $m;
    }
    $data = array_reduce($arr,'get');
    var_dump($data);
11��array_diff($arr1,$arr2);��������Ĳ��������.��$arr1�У�������$arr2�С�
    $arr1 = array(1,2,3,4,5);
    $arr2 = array(2,3);
    $data = array_diff($arr1,$arr2);
    var_dump($data);
12��array_intersect($arr1,$arr2);������� ������ ��$arr1�У�Ҳ��$arr2�С�
    $arr1 = array(1,2,3,4,5);
    $arr2 = array(2,3);
    $data = array_intersect($arr1, $arr2);
    var_dump($data);
13��array_combine($arr1,$arr2);�����µ����飬������ļ���$arr1��ֵ���������ֵ��$arr2��ֵ
    $arr1 = array('age','height','weight' );
    $arr2 = array(11,22,33);
    $data = array_combine($arr1,$arr2);
    var_dump($data);
14��array_keys($arr,'val');���µ� ������ʽ������������м�������������ʽ����val�����м�
    $arr = array('red','blue','red','blue');
    $data = array_keys($arr,'blue');
    var_dump($data);
15��array_values($arr);���غ�����ֵ����������
    $arr = array('name'=>'lisi','age'=>23,'weight'=>80);
    $data = array_values($arr);
    var_dump($data);
16��ksort($arr);�����鰴��������
17��array_key_exists('key',$arr);���ز���ֵ�����Ƿ���������
    $arr = array('first'=>11,'second'=>22);
    if(array_key_exists('first',$arr)){
    	echo 'ok';
    }
18��array_chunk($arr,int);�����µ����飬�и��ÿ��С�������Ԫ�ظ���Ϊint
     $arr = array(1,2,3,4,5,6);
    $data = array_chunk($arr,2);
    var_dump($data);
19��array_slice($arr,startInt,LengthInt);���������е�һ�Σ���ʼλ�úͳ���
   $arr = array(1,2,3,4,5,6);
    $data = array_slice($arr,1,2);
    var_dump($data);
20��array_flip($arr);��������ļ���ֵ
   $arr = array('name'=>'lisi','age'=>23);
   $data = array_flip($arr);
   var_dump($data);
21��shuffle($arr);���ز���ֵ��ֻ�ǽ��еĲ���
   $arr = range(1,5);
    shuffle($arr);
  var_dump($arr);
22��json_encode($arr);����ɹ�����json������ַ���

23��

25��array_diff_assoc($arr1,$arr2);������������������Ĳ��������һ�£�Ҳ���и���������������� array1 �е��ǲ����κ��������������е�ֵ��ע��� array_diff()  ��ͬ���Ǽ���Ҳ���ڱȽ�
26��array_diff_key($arr1,$arr2);ʹ�ü����Ƚϲ������ array1 �еļ����� array2 ���бȽϣ����ز�ͬ���������array_diff();��ͬ���Ƚϵ����ݲ�ͬ













";