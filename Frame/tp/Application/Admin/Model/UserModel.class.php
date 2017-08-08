<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/8
 * Time: 9:51
 */
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    public function add(){
        $user_id = D('User')->field('user_id')->select();
        return $user_id = array_column($user_id);
    }
}