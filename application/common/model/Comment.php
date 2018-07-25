<?php
namespace app\common\model;

use think\Model;

class Comment extends Model
{
	protected $autoWriteTimestamp = 'datetime';
    protected $updateTime = false;
    protected $createTime = 'ctime';	
    protected $insert = ['host'];  
    public function setHostAttr()
    {
    	$ip_long = sprintf('%u',ip2long(request()->ip()));
        return $ip_long;
    }

    public function getHostAttr($value)
    {
        return long2ip($value);
    }

    public function setContentAttr($value)
    {
        return htmlspecialchars($value);
    }

    public function getContentAttr($value)
    {
        return htmlspecialchars_decode($value);
    }
}