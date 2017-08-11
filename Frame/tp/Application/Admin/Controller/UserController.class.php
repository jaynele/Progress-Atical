<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/8/8
 * Time: 9:41
 */
namespace Admin\Controller;

use Think\Controller;

class UserController extends Controller
{
    public function index()
    {
        dump(D(User)->getStuAll());die;
    }
}