<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/1/22
     * Time: 22:51
     */

    namespace app\index\base;


    use think\Controller;
    use think\Request;

    class BaseController extends Controller {

        public function __construct(Request $request = null) {
            parent::__construct($request);
        }
    }