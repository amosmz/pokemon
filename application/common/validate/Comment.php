<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/9
 * Time: 21:53
 */
namespace app\common\validate;
use think\Validate;
class Comment extends Validate {
    protected $rule = [
        'aritcle_id' => 'require',
        'content'    => 'require',
        'host'       => 'ip',
    ];

    protected $message  =   [
        'aritcle_id.require' => 'ID不能为空',
        'content.require'    => '评论不能为空',
        'host.ip'            => 'IP不能为空'
    ];

    // 场景设置
    protected  $scene = [
        'add'    => ['aritcle_id','content','host'],
    ];
}