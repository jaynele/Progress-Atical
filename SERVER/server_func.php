<?php

class func{
    static  public function ser(){
        var_dump($_SERVER['HTTP_HOST']);//���ؿͻ���localhost
        var_dump($_SERVER['REQUEST_URI']);//www/git/index.php
        var_dump($_SERVER['REMOTE_ADDR']);//��ʵ�ͻ���::1
//        var_dump($_SERVER['REMOTE_HOST']);
        var_dump($_SERVER['REMOTE_PORT']);//�˿�
        var_dump($_SERVER['REQUEST_METHOD']);//���󷽷�get
        var_dump($_SERVER['REQUEST_TIME']);//����ʱ��
        var_dump($_SERVER['DOCUMENT_ROOT']);//��·��
        var_dump($_SERVER['HTTP_REFERER']);//��������·��Ŀ¼
    }
}
func::ser();