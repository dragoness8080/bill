<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/24 0024
 * Time: 21:33
 */

namespace app\index\model;
use think\Model;

class Member extends Model {

    public function getMemberInfo($username,$pwd){
        return $this->where(array('username' => $username,'password' => $pwd))->find();
    }
}