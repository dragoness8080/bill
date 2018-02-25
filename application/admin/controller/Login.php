<?php
/**
 * Created by PhpStorm.
 * User: appleimac
 * Date: 18/2/25
 * Time: 上午11:23
 */

namespace app\admin\controller;


use all\admin\model\Manager;
use app\admin\base\Base;
use think\Request;

class Login extends Base {

    protected function _initialize() {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    public function index(){

        if($this->checkLoginStatus()){
            $this->success('已登录，直接跳转', $this->ret);
        }

        return $this->fetch();
    }

    public function doLogin(){

        $username = Request::instance()->port('username');
        $password = Request::instance()->port('password');

        if(empty($username) || empty($password)){
            $this->error('用户名或密码不正确', url('admin/login'));
        }

        $managerModel = new Manager();

        if($managerModel->doLogin($username, $password)){
            $this->success('登录成功', $this->ret);
        }

        $this->error('登录失败，请重新登录', url('admin/login'));
    }

    public function register(){

    }
}