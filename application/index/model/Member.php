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
        return $this->where(array('username' => $username,'pwd' => $pwd))->find();
    }

    public function getMember($id){
        return $this->where(array('id' => $id))->find();
    }

    public function checkUserName($username){
        return $this->where(array('username' => $username))->find();
    }

    public function checkEmail($email){
        return $this->where(array('email' => $email))->find();
    }
}