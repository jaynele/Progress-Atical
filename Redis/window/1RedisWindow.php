<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/16
 * Time: 11:50
 */
echo '

大意就是 Redis官方是不支持windows的，只是 Microsoft Open Tech group 在 GitHub上开发了一个Win64的版本,项目地址是：

https://github.com/MSOpenTech/redis

打开以后，可以直接使用浏览器下载，或者git克隆

在 Release 页面中，可以找到 msi 安装文件以及 .zip 文件(而且有3.0的beta版，请下拉查找)。

下载zip文件，解压之后有下面的文件

redis-benchmark.exe         #基准测试
redis-check-aof.exe         # aof
redis-check-dump.exe        # dump
redis-cli.exe               # 客户端
redis-server.exe            # 服务器
redis.windows.conf          # 配置文件

当然，还有一个 RedisService.docx 文件，看似是一些启动和安装服务的说明文档,但是照着他的指示来,你就会死的很惨，莫名其妙的死了，不知道原因。




















';