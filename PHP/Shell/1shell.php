<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/11/1
 * Time: 10:42
 */

//建.sh文件  ，shell脚本文件，shell脚本文件，php脚本，python脚本都是命令包package

//shell 脚本,为脚本添加执行权限
#！/bin/bash
//一系列脚本命令   cd   pwd


//变量，表达式，控制结构


//变量     自定义变量，系统变量，命令值返回变量,声明变量时,不要加$,且'='号前后不要加空格,而在引用变量时,则要加上$
#!/bin/bash
//var1=hello
//var2=bash
//echo $var1 $var2



//系统变量
#!/bin/bash
//echo $HOME
//echo $USER


//命令返回值变量#!/bin/bash   需要把命令的运行结果捕捉,并赋给某变量,则可以用反引号 `命令` 来实现.
//var1=`date +%y%m%d`
//echo $var1
//date +%y%m%d


//表达式  命令表达式，数学表达式，字符串表达式，文件判断表达式
//控制结构   if/case/for/while


//1、命令表达式，if/else控制结构，一个命令执行成功,则返回 true,如果执行失败,则执行 false

//if 表达式
//then
//语句 1
//语句 2
//....
//else
//语句 one
//语句 two
//.....
//fi


#!/bin/bash
//if mkdir dir1
//then
//echo ok
//else
//echo fail
//fi



//2 数学表达式  [ $var1 -gt/-lt/-eq/-ge/-le/-ne $var2 ]    中括号两端各有 1 空格
#!/bin/bash
//var1=8
//var2=12
//if [ $var1 -gt $var2 ]
//then
//echo $var1 more than $var2
//elif [ $var1 -eq $var2 ]
//then
//echo $var1 equal $var2
//else
//echo $var1 less than $var2
//fi


//3字符串表达式   [ $str1 =/!= str2 ]
#!/bin/bash
//var1=hello
//var2=world
//if [ $var1 = $var2 ]
//then
//echo $var1 is $var2
//else
//echo $var1 is not $var2
//fi


//4、文件表达式    判断文件是否存在,是否可读/可写/可执行,是否是目录或普通文件等，以及用来比较两个文件的新旧顺序.
//格式 1: [ -d/-f/-e/-r/-w/-x filename ]
//分别判断
//-d 文件是否存在且是目录
//-f 文件是否存在且是文件
//-e 是否存在
//-r 是否可读
//-w 是否可写
//-x 是否可执行

#!/bin/bash
//if [ -d ./dir2 ]
//then
//ls dir2
//else
//echo dir2 is not exists
//fi



//1 for控制结构
//for 变量名 in 值 1 值 2 值 3 .... 值 n
//do
//语句 1
//语句 2
//....
//done



#!/bin/bash
//for i in A B C D E
//do
//echo $i
//done


#!/bin/bash
//for((i=1;i<=100;i++))
//sum=0
//do
//sum=$[ $sum + $i ]
//done
//echo $sum



//2  case控制结构    几行语句后面,放两个;;就可以了, 而不是每行后面都放两个;;*代表以上情况都不是时,类似于 java 中的 default

#!/bin/bash
//case $USER in
//shishi)
//echo -n “you “
//echo -n “are “
//echo “shishi”;;
//shikakak)
//echo you are shikakak
//*)
//echo sorry!
//esac


//定时任务的创建: crontab -e 进入任务编辑状态
//    2 1 * * * aaa # 代表每天 1:02 分执行 aaa 命令
//  */2 * * * * aaa # 代表每 2 分钟执行 aaa 命令


//数据库备份

#!/bin/bash
///usr/local/mysql/bin/mysqldump -uroot -p123456 -B test > /data/test.sql
//cd /data
//tar zcf test.sql.tar.gz test.sql
//mv test.sql.tar.gz bak/`date -d '-1 day' +%Y%m%d`.tar.gz
//old=`date -d '-1 day' +%Y%m%d`
//if [ -f /data/bak/$old.tar.gz ]
//then
//rm -rf /data/bak/$old.tar.gz
//fi











