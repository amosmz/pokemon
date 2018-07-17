<?php
namespace app\index\controller;
use think\Controller;
class Index extends Base
{
	public function __construct() {
        $this->model = model('Article');
        $this->modelname = 'Article';
        return parent::__construct(); 
    }

    public function article(){
    	$id = request()->param('id');
    	$data = $this->model->where('id',$id)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function download(){
        return $this->fetch();
    }

    public function about(){
        return $this->fetch();
    }

    //查找标题
    public function serach(){
        $model = $this->model;
        $keyword = request()->param('keyword');
        $lists = $model->content($keyword)->order('id desc')->paginate('10');
        // 把分页数据赋值给模板变量list
        $this->assign('lists', $lists);
        return $this->fetch('index');
    }
}
 