<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/30
 * Time: 11:05
 */
echo '

(һ)��������ã�
        (1)����XDebug���ص�ַ��http://www.xdebug.org/

        (2)���ء�php_xdebug-2.3.2-5.4-vc9.dll�������临�Ƶ�d:\php\ext\Ŀ¼

        ��3������XDebug��d:\php\php.ini����ĩβ�������´��룺

        [Xdebug]
        zend_extension = d:\php\ext\php_xdebug-2.3.2-5.4-vc9.dll
        xdebug.remote_enable =1
        xdebug.remote_handler = "dbgp"
        xdebug.remote_host = "localhost"
        xdebug.remote_mode = "req"
        xdebug.remote_port = 9000

        ��4����֤��װ�Ƿ�ɹ�

        ��ⷽ��1����phpinfo��ҳ�У��ܹ�������XDebug������


        (5)
        ��ⷽ��2������������ʾ����Ϊ���ն˻����¼��ص���php�����php.ini��

        ��cmd������php -m���ܿ���XDebug˵�����óɹ�

(��)IDE������
        (6)
        PHPStorm��XDebug�����ڡ�File��->��Settings��->��Languages & Frameworks��->��PHP����Setting�У�

        (1)����PHP Server�ҵ���Servers�������������£� Name��localhostHost��localhostPort��80Debugger��XDebug

        (2)����PHP Debug�ҵ���Debug����XDebug�е�Debug Port��д9000������Ĭ�ϡ�



�����������FireFox��xdebug����
       ��1����װXDebug helper���
       ��2������XDebug helper�������ͼ�У������ѡ���Ȼ�������½������ã�IDE key��PhpStormDomain filter��locaohost


����) �����������úú󣬽������е���
       (1)��PHPStorm�п���Debug��������Ǹ���绰һ����ͼ�꼴�ɿ���Debug������
       ��2��������п���XDebug helper���
       (3)��PHPStorm�����öϵ����кź���հ״������������öϵ㡣


';