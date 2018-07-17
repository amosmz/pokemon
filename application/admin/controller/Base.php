<?php
namespace app\admin\controller;
use think\Controller;
class Base  extends Controller
{
    public $account;
    public $model = null;
    public $modelname = null;
    public function __construct() {
        parent::__construct();
        // 判定用户是否登录
        $isLogin = $this->isLogin();
        if(!$isLogin) {
            return $this->redirect(url('Login/index'));
        }
    }

    //判定是否登录
    public function isLogin() {
        // 获取sesssion
        $user = $this->getLoginUser();
        if($user && $user->id) {
            $this->assign('loginUser',$user);
            return true;
        }
        return false;

    }

    public function getLoginUser() {
        if(!$this->account) {
            $this->account = session('loginUser', '', 'admin');
        }
        return $this->account;
    }

    public function index($map = array(),$field = 'id desc',$num = 10){
        $model = $this->model;
        $lists = $model->where($map)->order($field)->paginate($num);
        // 把分页数据赋值给模板变量list
        $this->assign('lists', $lists);
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $data = request()->post();
            $model = $this->model;
            $name = '\\app\\common\\validate\\'.$this->modelname;
            $validate = new $name;
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
            }
            else{
                $file = request()->file('headimage');
                // 移动到框架应用根目录/public/uploads/ 目录下
                if($file){
                    $info = $file->move( '../public_html/public/uploads');
                    if($info){
                        $data['image'] = $info->getSaveName();
                    }else{
                        // 上传失败获取错误信息
                        $this->error($file->getError());
                    }
                }
                $result = $model->save($data);
                if(false === $result){
                    $this->error('添加失败');
                }else{
                    $this->success('添加成功');
                }
            }
        }   
        else{
            return $this->fetch();
        }
    }

    public function edit($id){
        $model = $this->model;
        if(request()->isPost()){
            $data = request()->post();
            $name = '\\app\\common\\validate\\'.$this->modelname;
            $validate = new $name;
            if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
            }else{
                $file = request()->file('headimage');
                // 移动到框架应用根目录/public/uploads/ 目录下
                if($file){
                    $info = $file->move( '../public_html/public/uploads');
                    if($info){
                        $data['image'] = $info->getSaveName();
                    }else{
                        // 上传失败获取错误信息
                        $this->error($file->getError());
                    }
                }
                $result = $model->allowField(true)->save($data,['id' => $id]);
                if(false === $result){
                    $this->success('修改失败');
                }else{
                    $this->success('修改成功');
                }
            }
        }
        else{
            $data = $model::get($id);
            $this->assign('data',$data);
            return $this->fetch();
        }
    }

    public function delete($id){
        // 根据主键删除
        $model = $this->model;
        $result = $model->where('id',$id)->delete();
        if(false === $result){
            // 验证失败 输出错误信息
            $this->error($model->getError());
        }else{
            $this->success('删除成功');
        }
    }

}
