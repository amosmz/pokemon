<?php
namespace app\admin\controller;
use think\Controller;
class Api extends Controller
{
   public function update_mate(){
      $lists = model('Texlib')->select();
      echo json_encode($lists);
   }
}
