<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/7/9
 * Time: 21:53
 */
namespace app\common\validate;
use think\Validate;
class Admin extends Validate {
    protected $rule = [
        'account' => 'require',
        'account' => 'unique:admin',
        'name'    => 'require',
        'password' => 'require',
    ];

    protected $message  =   [
        'account.require' => '账号必须',
        'account.unique' => '已有人使用账号',
        'name.require' => '昵称必须',
        'password.require' => '密码必须',    
    ];

    // 场景设置
    protected  $scene = [
        'add'    => ['account','name','password'],
        'edit'   => ['name'],
        'editpd' => ['password'],
    ];
}