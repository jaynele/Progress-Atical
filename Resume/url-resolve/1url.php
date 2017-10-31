<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/31
 * Time: 9:56
 */

//服务端请求地址url


//返回请求地址除域名外字符串地址包括PHP文件,不包括参数
echo '/www/0827/Test/0test.php';
$_SERVER['PHP_SELF'];


//返回请求地址字符串形式参数地址，只获取参数
echo 'a=1&m=3';
$_SERVER['QUERY_STRING'];


//返回请求地址字符串域名形式，获取域名
echo 'localhost';
$_SERVER['HTTP_HOST'];
$_SERVER['SERVER_NAME'];


//获取除域名外的，地址包含PHP文件，包含参数的内容
echo '/www/0827/Test/0test.php?a=1&m=3';
$_SERVER['REQUEST_URI'];



//获取上次请求的地址,返回字符串形式域名和地址，但是地址不含php文件，到目录就好了
$_SERVER['SERVER_REFERER'];



//获取请求完整url
var_dump('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
var_dump('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);


//包含端口完整url
//包含端口号的完整url
echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

//只取完整url路径
var_dump(dirname('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']));






//给定url，解析出需要的东西



$url = 'http://www.baidu.com/test/?a=1&m=2';
$arr = parse_url($url);

//返回字符串 '/test/'
var_dump($arr['path']);

//返回字符串 'a=1&m=2'
var_dump($arr['query']);

//返回字符串  'www.baidu.com'
var_dump($arr['host']);

