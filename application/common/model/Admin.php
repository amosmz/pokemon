<?php
namespace app\common\model;

use think\Model;

class Admin extends Model
{
	protected $autoWriteTimestamp = 'datetime';
    protected $updateTime = false;
    protected $createTime = 'ctime';	
	protected $readonly = ['account'];
	public function setPasswordAttr($value)
    {
        return md5($value);
    }
}