<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/30
 * Time: 11:05
 */
echo '

(一)服务端配置：
        (1)下载XDebug下载地址：http://www.xdebug.org/

        (2)下载“php_xdebug-2.3.2-5.4-vc9.dll”，将其复制到d:\php\ext\目录

        （3）配置XDebug打开d:\php\php.ini，在末尾增加如下代码：

        [Xdebug]
        zend_extension = d:\php\ext\php_xdebug-2.3.2-5.4-vc9.dll
        xdebug.remote_enable =1
        xdebug.remote_handler = "dbgp"
        xdebug.remote_host = "localhost"
        xdebug.remote_mode = "req"
        xdebug.remote_port = 9000

        （4）验证安装是否成功

        检测方法1：在phpinfo网页中，能够检索到XDebug字样，


        (5)
        检测方法2：（这里有显示是因为在终端环境下加载的是php里面的php.ini）

        在cmd下输入php -m，能看到XDebug说明配置成功

(二)IDE端配置
        (6)
        PHPStorm中XDebug配置在【File】->【Settings】->【Languages & Frameworks】->【PHP】的Setting中：

        (1)配置PHP Server找到【Servers】，配置项如下： Name：localhostHost：localhostPort：80Debugger：XDebug

        (2)配置PHP Debug找到【Debug】，XDebug中的Debug Port填写9000，其它默认。



（三）浏览器FireFox中xdebug配置
       （1）安装XDebug helper插件
       （2）配置XDebug helper插件在上图中，点击【选项】，然后按照如下进行配置：IDE key：PhpStormDomain filter：locaohost


（四) 上面三项配置好后，进行运行调试
       (1)在PHPStorm中开启Debug监听点击那个像电话一样的图标即可开启Debug监听，
       （2）浏览器中开启XDebug helper插件
       (3)在PHPStorm中设置断点在行号后面空白处单击即可设置断点。


';