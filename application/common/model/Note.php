<?php
namespace app\common\model;

use think\Model;

class Note extends Model
{
	
	protected $autoWriteTimestamp = 'datetime';
    protected $updateTime = 'utime';
    protected $createTime = false;	
}