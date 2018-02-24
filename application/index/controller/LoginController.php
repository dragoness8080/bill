<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/1/22
     * Time: 22:52
     */

    namespace app\index\controller;


    use app\index\model\MemberModel;
    use think\Controller;
    use think\Request;
    use think\Session;

    class LoginController extends Controller {

        public function loginAction(){
            if(Session::has('hasLogin') && Session::get('hasLogin')){
                $this->redirect('index.php/index/index');
            }
            return $this->fetch();
        }

        public function doLoginAction(){
            $userName   = Request::instance()->port('user_name');
            $password   = Request::instance()->port('password');
            $code       = Request::instance()->port('code');

            if(!captcha_check($code)){
                $this->error('验证码不正确，请重新输入');
            }

            if(!do_login(array('user_name' => $userName, 'password' => $password))){
                $this->error('用户名或密码不正确');
            }

            $this->success('登录成功，正在跳转，请等待', url('index.php/index/index'), 3);
        }

        public function registerAction(){
            return $this->fetch();
        }

        public function doRegisterAction(){


            $username = Request::instance()->port('user_name');
            $password = Request::instance()->port('password');
            $repwd = Request::instance()->port('repwd');

            $user = array(
                'username' => $username,
                'password'  => md5($password)
            );

            $member = new MemberModel();

            $member->save($user);

            $this->success('注册成功', url('index.php/index/index'),3);

        }
    }