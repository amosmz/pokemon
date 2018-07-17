<?php
namespace app\admin\controller;
use think\Controller;
class Pokemon  extends Base
{
    public function __construct() {
        $this->model = model('Pokemon');
        $this->modelname = 'Pokemon';
        return parent::__construct(); 
    }

    public function index($map = array(),$field = 'id desc',$num = 10){
       return parent::index($map = array(),$field ='num asc',$num = 20);
    }

    public function delete($id){
       $this->error('禁止删除');
    }

    public function add(){
       $this->error('禁止添加');
    }

     public function edit($id){
       $this->error('禁止编辑');
    }
}
