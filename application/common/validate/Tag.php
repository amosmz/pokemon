<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/9
 * Time: 21:53
 */
namespace app\common\validate;
use think\Validate;
class Tag extends Validate {
    protected $rule = [
        'name'    => 'require',
    ];

    protected $message  =   [
        'name.require' => '标签不能为空',
    ];

    // 场景设置
    protected  $scene = [
        'add,edit'    => ['name'],
    ];
}