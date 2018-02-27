<?php
/**
 * Created by PhpStorm.
 * User: appleimac
 * Date: 18/2/25
 * Time: 上午11:16
 */

namespace app\admin\base;


use think\Controller;
use think\Request;
use think\Session;

class Base extends Controller {

    protected $ret;

    protected function _initialize() {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $ret = Request::instance()->get('ret');
        $this->ret = empty($ret) ? url('index/index') : $ret;   //获取跳转路径
        $controller = strtolower(Request::instance()->controller());
        $action = strtolower(Request::instance()->action());

        $this->assign('controller', $controller);
        $this->assign('action', $action);
    }

    protected $beforeActionList = [
        //'checkToLogin'  => ['except' => 'login,doLogin,register,doRegister']
    ];

    /**
     * 检测是否登录
     * @return bool
     */
    public function checkLoginStatus(){
        return Session::has('admin') && Session::get('admin.has_login') ? true : false;
    }

    public function checkToLogin(){
        if(!$this->checkLoginStatus()){
            $this->error('请登录后再操作', url('login/login'));
        }
    }
}