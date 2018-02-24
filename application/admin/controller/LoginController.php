<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/2/23
     * Time: 23:06
     */

    namespace app\admin\controller;


    use think\Controller;
    use think\Session;

    class LoginController extends Controller {

        public function index(){

            if(Session::has('admin') && Session::get('admin')){
                $this->redirect('index');
            }

            return $this->fetch();
        }
    }