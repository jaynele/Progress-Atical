<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/11/1
 * Time: 10:42
 */

//��.sh�ļ�  ��shell�ű��ļ���shell�ű��ļ���php�ű���python�ű����������package

//shell �ű�,Ϊ�ű����ִ��Ȩ��
#��/bin/bash
//һϵ�нű�����   cd   pwd


//���������ʽ�����ƽṹ


//����     �Զ��������ϵͳ����������ֵ���ر���,��������ʱ,��Ҫ��$,��'='��ǰ��Ҫ�ӿո�,�������ñ���ʱ,��Ҫ����$
#!/bin/bash
//var1=hello
//var2=bash
//echo $var1 $var2



//ϵͳ����
#!/bin/bash
//echo $HOME
//echo $USER


//�����ֵ����#!/bin/bash   ��Ҫ����������н����׽,������ĳ����,������÷����� `����` ��ʵ��.
//var1=`date +%y%m%d`
//echo $var1
//date +%y%m%d


//���ʽ  ������ʽ����ѧ���ʽ���ַ������ʽ���ļ��жϱ��ʽ
//���ƽṹ   if/case/for/while


//1��������ʽ��if/else���ƽṹ��һ������ִ�гɹ�,�򷵻� true,���ִ��ʧ��,��ִ�� false

//if ���ʽ
//then
//��� 1
//��� 2
//....
//else
//��� one
//��� two
//.....
//fi


#!/bin/bash
//if mkdir dir1
//then
//echo ok
//else
//echo fail
//fi



//2 ��ѧ���ʽ  [ $var1 -gt/-lt/-eq/-ge/-le/-ne $var2 ]    ���������˸��� 1 �ո�
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


//3�ַ������ʽ   [ $str1 =/!= str2 ]
#!/bin/bash
//var1=hello
//var2=world
//if [ $var1 = $var2 ]
//then
//echo $var1 is $var2
//else
//echo $var1 is not $var2
//fi


//4���ļ����ʽ    �ж��ļ��Ƿ����,�Ƿ�ɶ�/��д/��ִ��,�Ƿ���Ŀ¼����ͨ�ļ��ȣ��Լ������Ƚ������ļ����¾�˳��.
//��ʽ 1: [ -d/-f/-e/-r/-w/-x filename ]
//�ֱ��ж�
//-d �ļ��Ƿ��������Ŀ¼
//-f �ļ��Ƿ���������ļ�
//-e �Ƿ����
//-r �Ƿ�ɶ�
//-w �Ƿ��д
//-x �Ƿ��ִ��

#!/bin/bash
//if [ -d ./dir2 ]
//then
//ls dir2
//else
//echo dir2 is not exists
//fi



//1 for���ƽṹ
//for ������ in ֵ 1 ֵ 2 ֵ 3 .... ֵ n
//do
//��� 1
//��� 2
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



//2  case���ƽṹ    ����������,������;;�Ϳ�����, ������ÿ�к��涼������;;*�����������������ʱ,������ java �е� default

#!/bin/bash
//case $USER in
//shishi)
//echo -n ��you ��
//echo -n ��are ��
//echo ��shishi��;;
//shikakak)
//echo you are shikakak
//*)
//echo sorry!
//esac


//��ʱ����Ĵ���: crontab -e ��������༭״̬
//    2 1 * * * aaa # ����ÿ�� 1:02 ��ִ�� aaa ����
//  */2 * * * * aaa # ����ÿ 2 ����ִ�� aaa ����


//���ݿⱸ��

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











