<?php
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

$str = '3,2,7,1,9,5';
$info = quick_sort($str);
var_dump($info);