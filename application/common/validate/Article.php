<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/9
 * Time: 21:53
 */
namespace app\common\validate;
use think\Validate;
class Article extends Validate {
    protected $rule = [
        'type' => 'require',
        'title' => 'require',
        'content'    => 'require',
    ];

    protected $message  =   [
        'type.require' => '类型必须',
        'title.require' => '标题必须',
        'content.require' => '内容必须',
    ];

    // 场景设置
    protected  $scene = [
        'add,edit'    => ['type','title','content'],
    ];
}