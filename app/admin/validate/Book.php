<?php
// +---------------------------------------------------------------------+
// | OneBase    | [ WE CAN DO IT JUST THINK ]                            |
// +---------------------------------------------------------------------+
// | Licensed   | http://www.apache.org/licenses/LICENSE-2.0 )           |
// +---------------------------------------------------------------------+
// | Author     | Bigotry <3162875@qq.com>                               |
// +---------------------------------------------------------------------+
// | Repository | https://gitee.com/Bigotry/OneBase                      |
// +---------------------------------------------------------------------+

namespace app\admin\validate;

/**
 * 图书验证器
 */
class Book extends AdminBase
{
    
    // 验证规则
    protected $rule =   [
        
        'name'                => 'require|unique:book',
        'price'               => 'require|number',
        'author'              => 'require',
    ];

    // 验证提示
    protected $message  =   [
        
        'name.require'              => '图书名称不能为空',
        'name.unique'               => '图书名称已存在',
        'price.require'             => '价格不能为空',
        'price.number'              => '价格必须为数字',
        'author.require'            => '作者不能为空'
    ];

    // 应用场景
    protected $scene = [
        
        'edit' =>  ['name','price','author'],
    ];
    
}
