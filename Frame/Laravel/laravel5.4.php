<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/10/19
 * Time: 16:51
 */
echo '


1����Ŀ¼�����.evn�ļ�����ʵ����һ��.env.example�ļ������
    ��example�ļ�Ҳ�ύ���汾�������У����������ŶӾ�֪����ʹ�õĿ�������
    ����Ҫ��.env�ļ��ύ���汾��������
    .env�в����Ķ�ȡ����ʹ��env()�������ڶ����ǵ�ֵ������ʱ���Ĭ��ֵ


2����Ŀ¼��config�ļ����������ļ�Ŀ¼
    ����������ֵ��config("App.timezone");���ļ�����"."Ȼ���������
    ����������ֵ��config(["app.timezone" => "America/Chicago"]);


3��appĿ¼����Ŀ��������
    consoleĿ¼���Զ����artisan����
    php artisan list make
    make:job �������ɶ�������
    make:event ����Ŀ¼���Դ���¼���
    make:mail ����¼�������
    make:notification ���Ӧ�÷��͵�֪ͨ
    make:policy ��Ȩ�����࣬�����ж�ĳ���û��Ƿ���Ȩ�޷����ض�����Դ�ļ�
    providers Ŀ¼����Ӧ�����з����ṩ��
    ��1������ļ���        ���� Composer ���ɵ��Զ���������
    ��2��bootstrapĿ¼��   ��ȡ Laravel Ӧ��ʵ��
    ��3��appĿ¼http��kernel�ļ���   ��������־�����Ӧ�û���������ǰ��Ҫ������ HTTP �м����
        ��Щ�м������ HTTP �Ự�Ķ�д���ж�Ӧ���Ƿ���ά��ģʽ����֤ CSRF ����
    ��4��appĿ¼��providersĿ¼���ļ��������ṩ�ߣ� config/app.php �����ļ��� providers ������
        �����ṩ�ߵ� register ���������ã�Ȼ�������ṩ�߱�ע��֮��boot ����������
        �����ṩ�߸���������ܵ����и��ָ�����������������ݿ⡢���С���֤�����Լ�·������ȣ�
        ������Ϊ���������������˿���ṩ���������ԣ������ṩ�������� Laravel ��������������Ҫ�Ĳ���
    ��5�����з����ṩ�߱�ע�ᣬ�ַ������·�ɻ��������ͬʱ����ָ�����м��


4����������
    ��1��vmware
    (2) ����Homestead
        1��git clone https://github.com/laravel/homestead.git Homestead
        ���뵽Homestead
        2��bash init.sh


5��·�ɻ��棬ע���µ�·�ɺ󣬶���Ҫִ�� php artisan route:cache,����ÿ�ζ���ӻ����ж�ȡ·��
    ���·�ɻ��棬����ִ������  php artisan route:clear


6��session ��configĿ¼��session.php������















';