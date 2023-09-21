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

namespace app\admin\controller;

/**
 * 图书控制器
 */
class Book extends AdminBase
{
    
    /**
     * 图书列表
     */
    public function bookList()
    {
        
        $this->assign('list', $this->logicBook->getBookList());
        
        return $this->fetch('book_list');
    }
    
    /**
     * 图书添加
     */
    public function bookAdd()
    {
        
        IS_POST && $this->jump($this->logicBook->bookEdit($this->param));
        
        return $this->fetch('book_edit');
    }
    
    /**
     * 图书编辑
     */
    public function bookEdit()
    {
        
        IS_POST && $this->jump($this->logicBook->bookEdit($this->param));
        
        $info = $this->logicBook->getBookInfo(['id' => $this->param['id']]);
        
        $this->assign('info', $info);
        
        return $this->fetch('book_edit');
    }
    
    /**
     * 图书删除
     */
    public function bookDel($id = 0)
    {
        
        $this->jump($this->logicBook->bookDel(['id' => $id]));
    }
}
