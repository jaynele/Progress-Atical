<?php

class func{
    static  public function ser(){
        var_dump($_SERVER['HTTP_HOST']);//本地客户端localhost
        var_dump($_SERVER['REQUEST_URI']);//www/git/index.php
        var_dump($_SERVER['REMOTE_ADDR']);//真实客户端::1
//        var_dump($_SERVER['REMOTE_HOST']);
        var_dump($_SERVER['REMOTE_PORT']);//端口
        var_dump($_SERVER['REQUEST_METHOD']);//请求方法get
        var_dump($_SERVER['REQUEST_TIME']);//请求时间
        var_dump($_SERVER['DOCUMENT_ROOT']);//根路径
        var_dump($_SERVER['HTTP_REFERER']);//整个请求路径目录
    }
}
func::ser();