<?php
namespace app\common\model;
use think\Model;

class Article extends Model
{
	protected $autoWriteTimestamp = 'datetime';
    protected $updateTime = false;
    protected $createTime = 'ctime';	

	public function setContentAttr($value)
    {
        return htmlspecialchars($value);
    }

    public function getContentAttr($value)
    {
        return htmlspecialchars_decode($value);
    }

    public function scopeTitle($query, $title)
    {
        $query->where('title', 'like', '%' . $title . '%');
    }

    public function scopeContent($query, $content)
    {
        $query->where('content', 'like', '%' . $content . '%');
    }

    public function scopeTag($query, $tag)
    {
        $query->where('tag', 'like', '%' . $tag . '%');
    }
}