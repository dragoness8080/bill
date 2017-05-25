<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/24 0024
 * Time: 21:36
 */

namespace app\index\controller;


use think\Controller;
use think\Request;

class BaseController extends Controller {

    public function __construct(Request $request = null){
        parent::__construct($request);
    }

}