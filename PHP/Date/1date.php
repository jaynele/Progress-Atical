<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/24
 * Time: 10:09
 */


/**
 * ��ȡ��Ȼ��
 */

//��ȡ��Ȼ��һ��   ��һ����������ʽ
echo date('Y-m-d', strtotime('-1 week last monday')) . ' 00:00:00';
//��ȡ��Ȼ��һ�� ��һ��   ������
echo date('Y-m-d', strtotime('last sunday')) . ' 23:59:59';
//����ʱ�����ȷ���ܼ�
$arr = array('��', 'һ', '��', '��', '��', '��', '��');
echo '����' . $arr[date('w', $time)];



/**
 * ��ȡ��Ȼ��
 */

//�ϸ��� �³���һ����
//ȷ���ϸ���$y  $m �����³���һ��ʱ���
$time1 = strtotime(date($y.'-'.$m.'-01'));
//�ϸ��� ��ĩ���һ����
//ȷ���ϸ����³�����ĩ������Ҫ�õ�ʱ���
$time2 = strtotime(date($y . '-' . $m . '-01') . ' + month');




