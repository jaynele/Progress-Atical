<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/7/29
 * Time: 13:25
 */

namespace space2;


class obj_and_class_extends
{
    public function a()
    {
        echo '��ļ̳�';
        echo 'һ������õ����������';
        echo '����Ź������ݣ��������������';
        echo '�������ø���Ĺ��췽�����̳и����public protected,û�м̳�private����������';
        echo '���� instanceof ��������ʾ��������������ͣ����ز���';
        echo '���췽���ļ̳У����£�';
        echo '���ñ���д�ķ�����parent�ؼ���';
        echo '�κ����ж����Է���public,��ǰ��������п��Է���protected����ǰ���з�����private';
    }

    public function __construct($a, $b, $c)
    {
        public $c;
        parent::__construct($a, $b);
        $this->c = $c;
    }
}