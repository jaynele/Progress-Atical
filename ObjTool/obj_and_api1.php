<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/4
 * Time: 15:03
 */

namespace obj_tool;


class obj_and_api
{
    public function a()
    {
        echo '����API������';
        echo 'Reflection Ϊ���ժҪ��Ϣ�ṩ��̬����';
        echo 'ReflectionClass ����Ϣ�͹���';
        echo 'ReflectionMethod ������Ϣ�͹���';
        echo 'ReflectionProperty ��������Ϣ';
        echo 'ReflectionParameter ����������Ϣ';
        echo 'ReflectionFunction ������Ϣ�͹���';
        echo 'ReflectionExtension PHP��չ��Ϣ';
        echo 'ReflectionException ������';
    }

    public function buseness()
    {
        $objReflection = new \ReflectionClass('className');
        \Reflection::export($objReflection);
        echo 'export�������������Ϣ';
        echo 'print_r���PHP���ݵĹ��ߣ�Reflection�Ǽ����ͺ����Ĺ���';
        $objReflection->getName();'��ȡ��������';
        $objReflection->isUserDefined();'��ȡ���Ƿ��Ѿ�����';
        $objReflection->isInternal();'������Ƿ���������';
        $objReflection->isAbstract();'������Ƿ��ǳ����';
        $objReflection->isInterface();'������Ƿ�Ϊ�ӿ�';
        $objReflection->isInstantiable();'������Ƿ��ʵ����';
        $objReflection->getFileName();'�õ����ļ��ľ���·��';
        $lines = file($objReflection->getFileName());//file()������ȡ��������ɵ�����
        $start = $objReflection->getStartLine();'���ļ���ʼ���к�';
        $end = $objReflection->getEndLine();'���ļ��������к�';
        implode(array_slice($lines,$start-1;$end));

        $objReflection->getMethods();'��ȡ����������з�������ֱ����ReflectionMethod';

    }
}



