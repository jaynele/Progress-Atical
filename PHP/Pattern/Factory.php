<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/9/14
 * Time: 15:56
 */
echo '
���������ʵ��
����һ�㻯�������⻯
����ģʽ��ע  ��������ʱ�����ʵ��������    ������
���ض�������ʵ��������

������������������
��������1��Ȼ������һ������2�������������
������ô��ȡ�����һ������2��
ֱ�ӰѶ���2���ݸ�����1��
�ڶ���1��ʹ������������ö���2�еķ���

���������������䳣�����������ġ�����ζ����������

Ҫ��������⣺
�ڴ�������ʱ��֪��Ҫ���ɵĶ�������
��Ҫ���ر����ɼ���һЩ����2
ÿһ������2�����Զ����ض��Ĺ���

��������ģʽ�Ѵ��������Ҫ�����Ĳ�Ʒ����뿪
��������һ�������࣬�������������ɲ�Ʒ������෽�������û���ṩʵ�֣���ô���ɴ������������ʵ��
һ������£��Ǵ������������ʵ����һ����Ӧ�Ĳ�Ʒ����

�����
��������ģʽ�п��Կ�����������Ͳ�Ʒ���νṹ�ر����γ���һ������Ĵ����ظ���Ȼ�����˲����
Ϊ�������ഴ�������ԭ����Ϊ��ʵ�ֹ�������ģʽ��������Ʒ�������Ȼ�����Ҫ�ٿ���һ��

���ԣ���������ģʽ�ͳ��󹤳�ģʽ������һ��ʹ��


';

abstract class CommonManager
{
    abstract function getHeaderManager();

    abstract function getObjCoder();

    abstract function getFooterManager();
}

class Manager extends CommonManager
{
    function getHeaderManager()
    {
        return 'header';
    }

    function getObjCoder()
    {
        return new Coder();
    }

    function getFooterManager()
    {
        return 'footer';
    }
}

abstract class CommonCoder
{
    abstract function blog();
}

class Coder extends CommonCoder
{
    function blog()
    {
        return 'coder';
    }
}