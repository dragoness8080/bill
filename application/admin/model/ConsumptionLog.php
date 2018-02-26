<?php
/**
 * Created by PhpStorm.
 * User: appleimac
 * Date: 18/2/26
 * Time: 下午4:04
 */

namespace app\admin\model;


use think\Model;

class ConsumptionLog extends Model {

    protected $table = 'consumption_log';
    protected $pk = 'id';

    public function consumption(){
        return $this->hasOne('Consumption','cid','id','c');
    }
}