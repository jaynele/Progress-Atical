<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/24
 * Time: 10:09
 */


/**
 * 获取自然周
 */

//获取自然上一周   周一早上日期形式
echo date('Y-m-d', strtotime('-1 week last monday')) . ' 00:00:00';
//获取自然上一周 上一周   周日晚
echo date('Y-m-d', strtotime('last sunday')) . ' 23:59:59';
//给定时间戳，确定周几
$arr = array('日', '一', '二', '三', '四', '五', '六');
echo '星期' . $arr[date('w', $time)];



/**
 * 获取自然月
 */

//上个月 月初第一天早
//确定上个月$y  $m 返回月初第一天时间戳
$time1 = strtotime(date($y.'-'.$m.'-01'));
//上个月 月末最后一天晚
//确定上个月月初求月末，返回要用的时间戳
$time2 = strtotime(date($y . '-' . $m . '-01') . ' + month');




