<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/9
 * Time: 16:44
 */
echo '

优化解决的问题：
timeout问题
慢查询问题
阻塞，锁问题

硬件优化
系统配置优化
数据库表结构设计
sql及索引优化

（1）哪些查询是需要优化的
慢查询日志内容较多会让我们的磁盘占用较多
mysqldumpslow分析慢查询日志

要想运行mysqldumpslow.pl（这是perl程序），下载perl编译器。下载地址：http://pan.baidu.com/s/1i3GLKAp
检测perl是否已经安装，运行里面搜索perl.exe，没搜到就说明没有安装
就是ActivePerl_5.16.2.3010812913.msi，一步一步安装后，将bin加入环境变量path。
现场的slow.log拿回来了，要在本地的windows环境上的mysql上分析，如何处理？
C:\Program Files\MySQL\MySQL Server 5.6\bin>perl mysqldumpslow.pl --help
进入到mysqldumpslow.pl所在目录，perl运行它，所以命令就是：
perl mysqldumpslow.pl -a -s -t D:\xampp\mysql\data\Lenovo-pc-slow.txt > c:\Users\123\Desktop\slow_new.txt
当显示下面的信息时候就是分析成功
Reading mysql slow query log from D:\xampp\mysql\data\Lenovo-PC-slow.log
成功了
分析结果的最下面内容：
Count: 4（执行了多少次）  Time=375.01s（每次执行的时间） (1500s)（一共执行了多少时间）  Lock=0.00s (0s)（等待锁的时间）
  Rows=10200.3（每次返回的记录数） (40801)（总共返回的记录数）, username[password]@[10.194.172.41]








';