<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/2/25
     * Time: 12:49
     */

    namespace all\admin\model;

    use think\Model;
    use think\Session;

    class Manager extends Model {

        protected $table = 'manager';
        protected $pk = 'id';

        /**
         * 登录验证
         * @param $username
         * @param $password
         * @return bool
         */
        public function doLogin($username, $password){

            $password = md5($password);

            $result = $this->where(['username' => $username, 'password' => $password])->find();
            $result = $result->toArray();

            if(empty($result)){
                return false;
            }

            Session::set('admin.username',$username);
            Session::set('admin.has_login', true);

            return true;
        }
    }