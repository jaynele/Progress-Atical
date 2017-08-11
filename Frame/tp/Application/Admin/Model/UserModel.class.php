<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/8
 * Time: 9:51
 */
namespace Admin\Model;

use Think\Model;

class UserModel extends Model
{
    public function getStuAll()
    {
        $list = $this->field('user_id')->select();
        $arr_stu_id = array_column($list,'user_id');
        return $arr_stu_id;
    }
}