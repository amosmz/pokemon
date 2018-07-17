<?php
namespace app\admin\controller;
use think\Controller;
class Texlib  extends Base
{
    public function __construct() {
        $this->model = model('Texlib');
        $this->modelname = 'Texlib';
        return parent::__construct(); 
    }

    public function index($map = array(),$field = 'id desc',$num = 10){
      $map = array();
      request()->param('specie') != null && $map[]  = ['specie','=',request()->param('specie')];
      request()->param('type') != null && $map[]  = ['type','=',request()->param('type') ];
      request()->param('keyword') != null&& $map[]  = ['keyword','like','%'.request()->param('keyword').'%' ];
      return parent::index($map,$field ='id asc',$num = 20);
    }

    public function delete($id){
       $this->error('禁止删除');
    }

    //通知机器人那边更新文本关键字
    public function update(){
      $lists = model('Texlib')->select();
      $file_name = '../public/reply.txt';
      $rule_file = fopen( $file_name ,'w' );
      foreach ($lists as $k => $v) {
         $text = str_replace(array("\r\n","\r","\n"), '\r\n', $v['text']);   
         $math = $v['type'] == 0 ? '精确匹配' : '模糊匹配';
         $lins = $math . "\t" . $v['keyword'] . "\t" . $text . "\r\n";
         fwrite($rule_file, $lins);
      }
      fclose($rule_file);
      $this->success('更新成功');
   }

   //通知机器人那边更新文本关键字
    public function reply_update(){
        $qq_url = "http://119.147.44.184/robot1/downfile.php";
        $r = file_get_contents($qq_url);
        $this->success('更新成功');
    }

}
