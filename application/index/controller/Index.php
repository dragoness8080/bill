<?php
namespace app\index\controller;

use app\index\model\Member;

class Index extends BaseController {

    public function index(){
        $this->fetch();
    }

    public function doLogin(){
        $username   = $_POST['username'];
        $pwd        = md5($_POST['pwd'].config('altkey'));

        $member = new Member();
        $info = $member->getMemberInfo($username,$pwd);
        if(empty($info)){
            $this->error(lang('member_does_not_exist'),'../index');
        }

        session_start();
        session(array('login' => array(
            'uid'   => $info['id'],
            'username'  => $info['username'],
            'group'     => $info['groupid'],
            'haslogin'  => true
        ),'expire' => 3600));
        $this->success(lang('login_success'),'/');
    }

    public function loginOut(){
        session_unset();
        session_destroy();

        $this->success(lang('login_out_success'),'/');
    }
}
