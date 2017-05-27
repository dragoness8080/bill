<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/24 0024
 * Time: 21:36
 */

namespace app\index\controller;


use app\index\model\Member;
use think\Config;
use think\Controller;
use think\Request;

class BaseController extends Controller {

    private $_member;

    public function __construct(Request $request = null){
        parent::__construct($request);
        Config::load(APP_PATH . '/config/config.php');

        //判断是否已经登录
        $except = array(
            'index' => array(
                'index','dologin','loginout','register'
            ),
        );

        $controller = $request->controller();
        $action     = $request->action();


        if(!in_array($action,$except[strtolower($controller)])){
            if(session('?login.haslogin') && session('login.haslogin')){

            }else{
                $this->error(lang('member_are_not_login_in'),'../');
            }

            $model = new Member();
            $this->_member = $model->getMember(session('login.uid'));
            $this->assign('member',$this->_member);
        }
    }

    /**
     * 左边会员中心栏
     */
    protected function getMemberNav(){
        $this->view->engine->layout('layout/main_layout','__LEFT__');
        $this->fetch('common/member_center');
    }

    /**
     * 头部导航
     */
    protected function nav(){

    }

}