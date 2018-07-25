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
        $lists = model('comment')->order('id desc')->where('aritcle_id',$id)->paginate(5);
        $this->assign('lists',$lists);
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

    //标签云
    public function tag(){
        $model = $this->model;
        $id = request()->param('id');
        $lists = $model->tag($id)->order('id desc')->paginate('10');
        // 把分页数据赋值给模板变量list
        $this->assign('lists', $lists);
        return $this->fetch('index');
    }

    //提交评论
    public function comment(){
        $data['aritcle_id'] = request()->param('aritcle_id');
        $data['content'] = request()->param('content');
        $validate = new \app\common\validate\Comment;
        if (!$validate->scene('add')->check($data)) {
            $this->error($validate->getError());
        }
        else{
            $result = model('comment')->save($data);
            if(false === $result){
                echo json_encode(array('status'=>1));
            }else{
                echo json_encode(array('status'=>0));
            }
        }

    }

    public function upload(){
        $test = new \app\admin\controller\Ueditor;
        echo $test->output(); 
    }
}
 