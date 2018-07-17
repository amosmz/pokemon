<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/9
 * Time: 21:53
 */
namespace app\common\validate;
use think\Validate;
class Texlib extends Validate {
    protected $rule = [
        'type' => 'require',
        'species' => 'require',
        'keyword'    => 'require',
        'text' => 'require',
    ];

    protected $message  =   [
        'type.require' => '类型必须',
        'species.require' => '匹配必须',
        'keyword.require' => '关键字必须',
        'text.require' => '回复内容必须',    
    ];

    // 场景设置
    protected  $scene = [
        'add,edit'    => ['type','species','keyword','text'],
    ];
}