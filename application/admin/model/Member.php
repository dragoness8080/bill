<?php
/**
 * Created by PhpStorm.
 * User: appleimac
 * Date: 18/2/26
 * Time: 上午10:42
 */

namespace app\admin\model;


use think\Model;

class Member extends Model {

    protected $table = 'member';
    protected $pk = 'id';
    protected $autoWriteTimestamp = true;
    protected $createTime = 'createtime';
    protected $updateTime = false;

    protected function initialize() {
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    public function occupation(){
        return $this->hasOne('Occupation', 'oid', 'id', 'occ')->field('title');
    }

    public function getGenderAttr($value){
        $gender = [-1 => '', 0 => '男', 1 => '女'];
        return $gender[$value];
    }

}