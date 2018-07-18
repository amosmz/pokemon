<?php
namespace app\admin\controller;
use think\Controller;
class Tag  extends Base
{
    public function __construct() {
        $this->model = model('Tag');
        $this->modelname = 'Tag';
        return parent::__construct(); 
    }

}
