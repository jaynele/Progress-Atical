<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/9
 * Time: 16:44
 */
echo '

�Ż���������⣺
timeout����
����ѯ����
������������

Ӳ���Ż�
ϵͳ�����Ż�
���ݿ��ṹ���
sql�������Ż�

��1����Щ��ѯ����Ҫ�Ż���
����ѯ��־���ݽ϶�������ǵĴ���ռ�ý϶�
mysqldumpslow��������ѯ��־

Ҫ������mysqldumpslow.pl������perl���򣩣�����perl�����������ص�ַ��http://pan.baidu.com/s/1i3GLKAp
���perl�Ƿ��Ѿ���װ��������������perl.exe��û�ѵ���˵��û�а�װ
����ActivePerl_5.16.2.3010812913.msi��һ��һ����װ�󣬽�bin���뻷������path��
�ֳ���slow.log�û����ˣ�Ҫ�ڱ��ص�windows�����ϵ�mysql�Ϸ�������δ���
C:\Program Files\MySQL\MySQL Server 5.6\bin>perl mysqldumpslow.pl --help
���뵽mysqldumpslow.pl����Ŀ¼��perl������������������ǣ�
perl mysqldumpslow.pl -a -s -t D:\xampp\mysql\data\Lenovo-pc-slow.txt > c:\Users\123\Desktop\slow_new.txt
����ʾ�������Ϣʱ����Ƿ����ɹ�
Reading mysql slow query log from D:\xampp\mysql\data\Lenovo-PC-slow.log
�ɹ���
������������������ݣ�
Count: 4��ִ���˶��ٴΣ�  Time=375.01s��ÿ��ִ�е�ʱ�䣩 (1500s)��һ��ִ���˶���ʱ�䣩  Lock=0.00s (0s)���ȴ�����ʱ�䣩
  Rows=10200.3��ÿ�η��صļ�¼���� (40801)���ܹ����صļ�¼����, username[password]@[10.194.172.41]








';