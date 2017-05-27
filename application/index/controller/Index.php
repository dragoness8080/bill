<?php
namespace app\index\controller;

use app\index\model\Member;
use think\Config;
use think\Validate;

class Index extends BaseController {

    public function index(){
        return $this->fetch();
    }

    public function doLogin(){

        $validate = new Validate([
            'username'  => 'require',
            'pwd'       => 'require',
            'captcha|验证码'   => 'require|captcha'
        ]);

        $username   = input('post.username/s');
        $pwd        = input('post.pwd/s');
        $code       = input('post.code/s');

        if(!$validate->check(array('username' => $username,'pwd' => $pwd,'captcha' => $code))){
            $this->error($validate->getError());
        }

        $pwd        = md5($pwd.Config::get('altkey'));

        $member = new Member();
        $info = $member->getMemberInfo($username,$pwd);
        if(empty($info)){
            $this->error(lang('member_does_not_exist'));
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

    public function register(){
        return $this->fetch();
    }

    public function doRegister(){
        $input = input('post.');
        $model = new Member();
        if($model->save($input)){
            $this->success(lang('register_success'),'__URL__/bill');
        }else{
            $this->error(lang('register_error'),'/');
        }
    }

    public function checkUserName(){
        if($this->request->isAjax()){
            $username = input('post.uname');
            $model = new Member();
            if($model->checkUserName($username)){
                $data['flat'] = true;
            }else{
                $data['flat'] = false;
                $data['msg'] = lang('ajax_checkusername_error');
            }
            return json($data);
        }
    }

    public function checkEmail(){
        if($this->request->isAjax()){
            $email = input('post.email');
            $model = new Member();
            if($model->checkEmail($email)){
                $data['flat'] = true;
            }else{
                $data['flat'] = false;
                $data['msg'] = lang('ajax_checkemail_error');
            }
            return json($data);
        }
    }

    public function loginOut(){
        session_unset();
        session_destroy();

        $this->success(lang('login_out_success'),'/');
    }
}
