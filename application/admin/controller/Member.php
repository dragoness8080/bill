<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/2/26
     * Time: 7:44
     */

    namespace app\admin\controller;


    use app\admin\base\Base;
    use think\Request;

    class Member extends Base {

        protected function _initialize() {
            parent::_initialize(); // TODO: Change the autogenerated stub
        }

        public function index(){

            $memberModel = model('Member');
            $list = $memberModel->paginate();
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

            $memberModel = model('Member');

            $member = $memberModel->where('id', $id)->find();

            if(Request::instance()->isPost()){

                $data = array(
                    'username'  => Request::instance()->post('username'),
                    'avatar'    => '',
                    'weixin'    => Request::instance()->post('weixin'),
                    'qq'        => Request::instance()->post('qq'),
                    'gender'    => Request::instance()->post('gender'),
                    'birthday'  => Request::instance()->post('birthday'),
                    'oid'       => Request::instance()->post('oid')
                );

                $password = Request::instance()->post('password');
                if(!empty($password)){
                    $data['password'] = md5($password);
                }

                if($type == 'add'){
                    $memberModel->save($data);
                }else{
                    $memberModel->save($data,['id' => $id]);
                }

                $this->success('会员操作成功', url('member/index'));
            }

            return $this->fetch('post');
        }

        public function delete(){
            $id = Request::instance()->get('id');
            $memberModel = model('Member');
            $memberModel->where('id',$id)->delete();
            $this->success('删除成功', url('member/index'));
        }
    }