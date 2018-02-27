<?php
/**
 * Created by PhpStorm.
 * User: appleimac
 * Date: 18/2/26
 * Time: 下午3:34
 * 职业
 */

namespace app\admin\controller;


use app\admin\base\Base;
use think\Request;

class Occupation extends Base {

    protected function _initialize() {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    public function index(){

        $occupation = model('Occupation');
        $list = $occupation->paginate();
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch();
    }

    public function add(){
        $this->post('add');
    }

    public function edit(){
        $this->post('edit');
    }

    private function post($type){

        $id = Request::instance()->get('id');
        $occupationModel = model('Occupation');
        $occ = $occupationModel->where('id', $id)->find();

        if(Request::instance()->isPost()){

            $data = [
                'parent_id'     => Request::instance()->post('parentId'),
                'title'         => Request::instance()->post('title'),
                'order_by'      => empty(Request::instance()->post('orderBy')) ? 0 : Request::instance()->post('orderBy')
            ];

            if($type == 'add'){
                $occupationModel->save($data);
            }else{
                $occupationModel->data($data,['id' => $id]);
            }

            $this->success('职业操作成功', url('occupation/index'));
        }

        return $this->fetch('post');
    }

    public function delete(){

        $id = Request::instance()->get('id');
        if(empty($id)){
            $this->error('请选择要删除职业');
        }

        $occupationModel = model('Occupation');
        $list = $occupationModel->where('parent_id', $id)->select();
        if(!empty($list)){
            $this->error('当前职业还有下级，请取消下级后在删除');
        }

        $occupationModel->where('id', $id)->delete();
        $this->success('删除成功', url('occupation/index'));
    }
}