<?php
/**
 * Created by PhpStorm.
 * User: appleimac
 * Date: 18/2/26
 * Time: 上午10:52
 */

namespace app\admin\model;


use think\Model;

class Occupation extends Model {

    protected $table = 'occupation';
    protected $pk = 'id';
    protected $layout = 1;  //层级

    protected function initialize() {
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    /**
     * 获取层级的类型
     * @param int $pid
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getLayoutList($pid = 0){
        $list = $this->where('parent_id', '=', $pid)->order('order_by','desc')->select();
        return $list;
    }

    /**
     * 获取当前可增加下级的职业
     * @param int $pid
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getParentList($pid = 0){
        $list = $this->where('parent_id', '=', $pid)
                    ->where('is_parent', '>', 0)
                    ->select();
        return $list;
    }

    /**
     * 树形
     * @param int $pid
     * @return mixed
     */
    protected function getTree($pid = 0){

        $list = $this->where('parent_id', '=', $pid)
            ->where('is_parent', '>', 0)
            ->select();

        if(!empty($list)){
            foreach ($list as $key => $item){
                $data[$item['id']] = $item['title'];
                $data[$item['id']]['sub'] = $this->getTree($item['id']);
            }
        }

        return $data;
    }
}