<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/11/1
 * Time: 15:29
 */

//ʲô��HTTPЭ�飬Э����ָ�����ͨ����������̨�����֮�����ͨ�������빲ͬ���صĹ涨�����
//���ı�����Э��(HTTP)��һ��ͨ��Э�飬���������ı��������(HTML)�ĵ���Web���������͵��ͻ��˵������


//����ͷ�ֶ�
//1.Accept��text/html ��image/gif       �ͻ����ڴ����յ��ļ�����
//2.Accept-Encoding��  gzip,deflate     �ͻ��˿��Խ��յı����ʽ��
//3.Accept-Languages��zh-cn             �ͻ����������յ�����������
//4.Cache-Control��no-cache ����Ҫ��ȡ�����ļ�
//                no-store����ֹ������
//          only-if-cached��ϣ���������Ի���
//            no-transform����֪������Ҫ��ý�����ͣ����磺png ���ܸ�Ϊjpeg
//5.connection:Upgrade,
//             Keep-Alive���ͻ��˵�����˵����������Ч
//             close:��Ӧ��ɺ�ر�    �Ƿ���Ա��̶ֹ���HTTP����
//6.Host:�����Ŀ������
//7.cookie:
//8.pragma:no-cache
//9.user-Agent:ʹ�õ���������ͣ�����ϵͳ�汾��cpu���ͣ��������Ⱦ���棬��������ԺͲ��

//����ͷ��Accept  Accept-Encoding  Accept-Language  Cache-control   connection  host  cookie  pragma  user-agent


//���ĳ��ʹ��cookie����վ��������Ϊ�û�����һ��Ψһ��ʶ���룬


//���û����ĳ��ʹ��Cookie����վʱ������վ�ķ�������Ϊ�û�����һ��Ψһ��ʶ���룬
//���Դ���Ϊ�����ڷ������ĺ�����ݿ��в���һ����Ŀ��
//���ڸ��û���HTTP��Ӧ���������һ������Set-Cookie���ײ��У�����ġ��ײ��ֶ����ơ����ǡ�Set-Cookie����
//��Ӧ���ֶ�ֵ���Ƿ�����������û��ġ�ʶ���롱�����ʽ���£�
//Set-cookie��abcdefg(ֻ��Ϊʾ����ʵ�ʿ϶����������)
//���û��յ������Ӧʽ���������������������ض�Cookie�ļ������һ�У�
//���а������������������������host�ֶΣ���Set-cookie��Ӧ�������վ��ʶ���룬���ŵ�HTTP�����ĵ�Cookie�ײ����У����£�
//Cookie��abcdefg