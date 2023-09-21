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
class Library extends AdminBase
{

    // libraryindex 首页
    public function libraryindex($id = 0)
    {
        
        return $this->fetch('library_index');
    }
    
    /**
     * 图书列表
     */
    public function libraryList()
    {
        
        $this->assign('list', $this->logicLibrary->getLibraryList());
        
        return $this->fetch('library_list');
    }
    
    /**
     * 图书添加
     */
    public function libraryAdd()
    {
        
        IS_POST && $this->jump($this->logicLibrary->libraryEdit($this->param));
        
        return $this->fetch('library_edit');
    }
    
    /**
     * 图书编辑
     */
    public function libraryEdit()
    {
        
        IS_POST && $this->jump($this->logicLibrary->libraryEdit($this->param));
        
        $info = $this->logicLibrary->getLibraryInfo(['book_id' => isset($this->param['id'])?$this->param['id']:0]);

        $this->assign('info', $info);
        
        return $this->fetch('library_edit');
    }
    
    /**
     * 图书删除
     */
    public function libraryDel($id = 0)
    {
        
        IS_POST && $this->jump($this->logicLibrary->libraryDel(['id' => $id]));

        return $this->fetch('library_del');
    }
    
    // libraryCommont 留言板
    public function librarycomment($id = 0)
    {
        
        return $this->fetch('library_comment');
    }

    // libraryrecord 借阅记录
    public function libraryrecord($id = 0)
    {
        
        return $this->fetch('library_record');
    }

    // libraryrecord 借阅记录
    public function librarylibrarycurrent($id = 0)
    {
        
        return $this->fetch('library_current');
    }
}
