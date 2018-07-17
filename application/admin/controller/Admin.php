<?php
namespace app\admin\controller;
use think\Controller;
class Admin  extends Base
{
    public function __construct() {
        $this->model = model('Admin');
        $this->modelname = 'Admin';
        return parent::__construct(); 
    }

    public function editpd($id){
        $model = $this->model;
        if(request()->isPost()){
            $data = request()->post();
            $validate = new \app\common\validate\Admin;
            if (!$validate->scene('editpd')->check($data)) {
                $this->error($validate->getError());
            }else{
                $result = $model->allowField(true)->save($data,['id' => $id]);
                if(false === $result){
                    $this->success('修改密码失败');
                }else{
                    $this->success('修改密码成功');
                }
            }
        }
        else{
            $data = $model::get($id);
            $this->assign('data',$data);
            return $this->fetch();
        }
    }
}
