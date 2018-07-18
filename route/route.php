<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
Route::rule('/', 'index'); // 首页访问路由
Route::rule('download', 'index/download'); // 静态地址路由
Route::rule('about', 'index/about'); // 静态地址路由
Route::get('article/:id','index/article');
Route::get('tag/:id','index/tag');
return [

];
