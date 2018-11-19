<?php

//冒泡排序
function buttle($arr)
{
    $len = count($arr);
    if ($len == 1) {
        return $arr;
    }
    for ($i = 0; $i < $len; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}

//PHP快速排序
function quick_sort($str) {
  if (!$str || !is_string($str)) {
    return false;
  }
  $arr = explode(',', $str);
  $length = count($arr);
  if ($length == 1) {
    return $arr;
  }
  $left = $right = [];
  for ($i = 1;$i < $length;$i++) {
    if ($arr[$i] < $arr[0]) {
      $left[] = $arr[$i];
    } elseif ($arr[$i] > $arr[0]) {
      $right[] = $arr[$i];
    }
  }
  $left = quick_sort(implode(',', $left));
  $right = quick_sort(implode(',', $right));
  if (is_array($left) && is_array($right)) {
    return array_merge($left,[$arr[0]],$right);
  } elseif (is_array($left) && !$right) {
    return array_merge($left,[$arr[0]]);
  } elseif (!$left && is_array($right)) {
    return array_merge([$arr[0]],$right);
  }

}

// $str = '3,2,7,1,9,5';
// $info = quick_sort($str);
// var_dump($info);

//PHP获取连续重复字符的个数
function strCount($str) {
  if (!$str) {
    return false;
  }
  $arr = explode(',', $str);
  $length = count($arr);
  $arrRes = [];
  for ($i = 0;$i < $length;$i++) {
    $is_finded = 0;
    if ($arrRes) {
      $num = count($arrRes) - 1;
      $info = end($arrRes);
      if ($info['key'] == $arr[$i]) {
        $arrRes[$num]['count'] += 1;
        $is_finded = 1;
        continue;
      }
    }
    if (!$is_finded) {
      $arrRes[] = ['key'=>$arr[$i],'count'=>1];
    }
  }
  return $arrRes;
} 

// $str = 'a,b,a,c,b,b,a';
// $info = strCount($str);
// var_dump($info);

//PHP二分查找
function getFindInfo ($arr,$lower,$hight,$m) {
  if (!$arr) {
    return 'error';
  }
  $mid = intval(($lower + $hight) / 2);
  if ($arr[$mid] == $m) {
    return $arr[$mid].'/'.$mid;
  } elseif ($arr[$mid] < $m) {
      return getFindInfo($arr,$mid + 1,$hight,$m);
  } elseif ($arr[$mid] > $m) {
      return getFindInfo($arr,$lower,$mid - 1,$m);
  }
}


// $str = '3,2,5,1,4';
// $arr = explode(',', $str);
// sort($arr);
// echo getFindInfo($arr,0,4,5);



/*获取以下结构数据
array(
  array(
    'id' => 5,
    'children' => array(
      array(
        'id' => 12,
        'children' => array(
          array(
            'id' => 23,
            'children' => array(
              array('id' => 26)
            )
          ),
          array('id' => 24),
          array('id' => 31)
        )
      ),
      array('id' => 19)
    )
  ),
  array(
    'id' => 9,
    'children' => array(
      array('id' => 29)
    )
  ),
  array('id' => 21),
);
*/


//树结构
$info = array(
  array('id' => 5,'parent_id' => 0),
  array('id' => 9,'parent_id' => 0),
  array('id' => 12,'parent_id' => 5),
  array('id' => 19,'parent_id' => 5),
  array('id' => 21,'parent_id' => 0),
  array('id' => 23,'parent_id' => 12),
  array('id' => 24,'parent_id' => 12),
  array('id' => 26,'parent_id' => 23),
  array('id' => 29,'parent_id' => 9),
  array('id' => 31,'parent_id' => 12),
);

function array_tree($array) {
  $result = array();
  $tmp = array();
  foreach($array as $item) {
    if($item['parent_id'] == 0) {
      $i = count($result);
      $result[$i] = $item;
      $id = $item['id'];
      $tmp[$id] = &$result[$i];
    } else {
      $id = $item['id'];
      $parent_id = $item['parent_id'];
      $parent = $tmp[$parent_id];
      $i = isset($parent['children']) ? count($parent['children']) : 0;
      $tmp[$parent_id]['children'][$i] = $item;
      $tmp[$id] = &$tmp[$parent_id]['children'][$i];
    }
  }
  return $result;
}


$res = array_tree($info);
// var_dump($res);


//递归求n的阶乘
