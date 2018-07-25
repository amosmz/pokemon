<?php
namespace app\admin\controller;
use think\Controller;
class Comment  extends Base
{
    public function __construct() {
        $this->model = model('Comment');
        $this->modelname = 'Comment';
        return parent::__construct(); 
    }

}
