<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/2/23
     * Time: 23:01
     */

    namespace app\admin\controller\base;


    use think\Controller;
    use think\View;

    class BaseController extends Controller {

        protected $view;

        protected function _initialize() {
            parent::_initialize(); // TODO: Change the autogenerated stub
            $this->view = new View();
        }


    }