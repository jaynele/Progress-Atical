<?php
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
