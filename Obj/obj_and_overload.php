<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/1
 * Time: 9:10
 */

namespace space2;


class obj_and_overload
{
    public function a(){
        echo 'ʹ���������ֽ�����';
        echo '__set() __get() __isset() __unset() __call()';
        echo '����δ��������Ե��ã���δ�������Ը�ֵ�����ã���δ��������Ե���issetʱ�����ã���δ��������Ե���unsetʱ�����ã�����δ����ķ���ʱ������';
        echo '����δ��������ԣ�__get()�����ã�get+���õ������������Ϊ�µķ�������method_exist()���ж϶���ķ����Ƿ���ڣ�������ھ͵���';
        echo '__call()����δ����ķ���';
    }
}