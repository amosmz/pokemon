<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Article  extends Base
{
    public function __construct() {
        $this->model = model('Article');
        $this->modelname = 'Article';
        return parent::__construct(); 
    }

    public function upload(){
    	$test = new \app\admin\controller\Ueditor;
        echo $test->output(); 
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
            	$data['uid'] = Session::get('loginUser.id','admin');
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
}
