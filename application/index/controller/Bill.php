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
    }

    public function index(){
        $this->view->engine->layout('layout/main_layout','__RIGHT__');
        $this->fetch();
    }
}