<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/31
 * Time: 9:56
 */

//����������ַurl


//���������ַ���������ַ�����ַ����PHP�ļ�,����������
echo '/www/0827/Test/0test.php';
$_SERVER['PHP_SELF'];


//���������ַ�ַ�����ʽ������ַ��ֻ��ȡ����
echo 'a=1&m=3';
$_SERVER['QUERY_STRING'];


//���������ַ�ַ���������ʽ����ȡ����
echo 'localhost';
$_SERVER['HTTP_HOST'];
$_SERVER['SERVER_NAME'];


//��ȡ��������ģ���ַ����PHP�ļ�����������������
echo '/www/0827/Test/0test.php?a=1&m=3';
$_SERVER['REQUEST_URI'];



//��ȡ�ϴ�����ĵ�ַ,�����ַ�����ʽ�����͵�ַ�����ǵ�ַ����php�ļ�����Ŀ¼�ͺ���
$_SERVER['SERVER_REFERER'];



//��ȡ��������url
var_dump('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
var_dump('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);


//�����˿�����url
//�����˿ںŵ�����url
echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

//ֻȡ����url·��
var_dump(dirname('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']));






//����url����������Ҫ�Ķ���



$url = 'http://www.baidu.com/test/?a=1&m=2';
$arr = parse_url($url);

//�����ַ��� '/test/'
var_dump($arr['path']);

//�����ַ��� 'a=1&m=2'
var_dump($arr['query']);

//�����ַ���  'www.baidu.com'
var_dump($arr['host']);

