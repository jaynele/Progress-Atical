<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/31
 * Time: 21:55
 */

//��ȡ�����ǰҳ����û���ip
var_dump($_SERVER['REMOTE_ADDR']);
var_dump(getenv('REMOTE_ADDR'));

//��ȡ�����ip
var_dump($_SERVER['SERVER_ADDR']);
var_dump(gethostbyname('www.baidu.com'));