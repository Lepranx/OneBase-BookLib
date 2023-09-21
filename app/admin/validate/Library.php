<?php
namespace app\admin\validate;

// Library 图书管理系统验证器
class Library extends AdminBase
{
    // 验证规则
    protected $rule =   [
        
        'book_name'  => 'require',
    ];
    
    // 验证提示
    protected $message  =   [
        'book_name.require'    => '书名不能为空',
    ];

    // 应用场景
    protected $scene = [
        'edit'  =>  ['book_name'],
    ];
}