<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/14
 * Time: 14:10
 * content:����ģʽ
 */
echo '
ȫ�ֱ����ǳ���bug��ԭ��֮һ��ʹ�ദ��һ���Ļ�����ƻ��˷�װ�ԣ��޷�ֱ����ȡ�������ã�
һ��ͨ����������������ĳ������
��������һ������������һ������
һ����ϵͳ���κζ���ʹ��

������Ӧ�ô��ڻᱻ��д�ı�����

����ϵͳ�в�����һ�������Ķ���

ǿ�ƿ��ƶ����ʵ����
����һ���޷����������ⲿ������ʵ������
���췽��˽��

ʹ�õ�����ʹ��ȫ�ֱ������
������ϵͳ���κεط�����ʹ��
�ı�һ�������Ϳ���ȫ����Ҫ�ı�
ʹ�õ���������ʹ����������ϵ
�����Ƕ�ȫ�ֱ����ĸĽ�
���ұ����������ռ������
���⴫�ݲ���Ҫ�Ķ���

';




class Test
{
    private static $getInstance;

    private function __construct()
    {
    }

    public static function getIns()
    {
        if (empty(self::$getInstance)) {
            self::$getInstance = new Test();
        }
        return self::$getInstance;
    }
}

var_dump(Test::getIns());