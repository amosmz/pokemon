<?php
namespace app\admin\controller;
use think\Controller;
class Index  extends Base
{
    public function index($map = array(),$field = 'id desc',$num = 10){
    	$model = model('Note');
    	if(request()->isPost()){
    		$data = request()->post();
			$result = $model->allowField(true)->save($data,['id' => 1]);
	            if(false === $result){
	                $this->success('更新失败');
	            }else{
	                $this->success('更新成功');
	        }
    	}else{
	    	$note = $model->get(1);
	    	$this->assign('data',$note); 
	    	return $this->fetch();
    	}
    }
}
