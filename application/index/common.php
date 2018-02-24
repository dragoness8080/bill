<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/1/22
     * Time: 22:47
     */

    /**
 * 会员登录
 * @param array $user
 * @return bool
 */
    function do_login($user = array()){

        if(empty($user)){   return false;}
        $user['password']   = md5($user['password']);
        $model  = new \app\index\model\MemberModel();
        $member = $model->where(array('username' => $user['username'], 'password' => $user['password']))->find();
        if(empty($member)){
            return false;
        }

        \think\Session::set('username', $member['username']);
        \think\Session::set('hasLogin', true);
        return true;
    }