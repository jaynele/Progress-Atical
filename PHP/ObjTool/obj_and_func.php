<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/4
 * Time: 14:15
 */

namespace obj_tool;


class obj_and_func
{
    public function a()
    {
        echo '�ຯ���Ͷ�����';
        echo 'class_exists file_exists ';
        echo 'get_class() ���ն�����Ϊ��������ȡ�������';
        echo 'instanceof������ ����Ǵ����Ķ����ұ����������������Ƕ����Ǹ��������ʵ������true';
        echo 'get_class_methods()������һ����������ȡһ����������public�������б�';
        echo 'method_exists ����һ������һ��������';
        echo 'get_class_vars()����������������Ϊһ���������飬����Ϊ����������ֵΪ����ֵ';
        echo 'get_parent_class()�õ���ĸ������֣������������Ϊ������';
        echo 'is_subclass_of(),�ڶ��������ǵ�һ�������ĸ��෵��true����ļ̳й�ϵ';
        echo 'class_implements()�����ɽӿ������ɵ�����';
    }
}