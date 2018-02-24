<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/1/22
     * Time: 22:58
     */

    namespace app\index\model;


    use think\Model;

    class MemberModel extends Model {
        protected $table    = 'member';
        protected $pk       = 'id';
    }