<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/24 0024
 * Time: 22:43
 */

namespace app\index\controller;


use think\Request;

class Bill extends BaseController {

    public function __construct(Request $request = null){
        parent::__construct($request);
        if(isset(session('login.haslogin')) && session('login.haslogin')){

        }else{
            $this->error(lang('member_are_not_login_in'));
        }
    }

    public function index(){

    }
}