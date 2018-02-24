<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/2/24
     * Time: 22:26
     */

    namespace app\admin\controller;


    use app\admin\controller\base\BaseController;
    use think\Session;

    class IndexController extends BaseController {

        public function index(){

            if(!Session::has('admin')){
                $this->error('请先登录', '/login',3);
            }

            return $this->fetch();

        }
    }