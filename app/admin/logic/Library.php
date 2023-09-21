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

namespace app\admin\logic;

/**
 * 图书逻辑
 */
class Library extends AdminBase
{
    
    /**
     * 获取图书列表
     */
    public function getLibraryList($where = [], $field = true, $order = '', $paginate = 0)
    {
        return $this->modelLibrary->getList($where, $field, $order, $paginate);
    }
    
    /**
     * 图书信息编辑
     */
    public function libraryEdit($data = [])
    {
        
        $validate_result = $this->validateLibrary->scene('edit')->check($data);
        
        if (!$validate_result) {
            
            return [RESULT_ERROR, $this->validateLibrary->getError()];
        }
        
        $url = url('libraryList');
        
        $result = $this->modelLibrary->setInfo($data);
        
        $handle_text = empty($data['book_id']) ? '新增' : '编辑';
        
        $result && action_log($handle_text, '图书' . $handle_text . '，name：' . $data['book_name']);
        
        return $result ? [RESULT_SUCCESS, '操作成功', $url] : [RESULT_ERROR, $this->modelLibrary->getError()];
    }

    /**
     * 获取图书信息
     */
    public function getLibraryInfo($where = [], $field = true)
    {
        
        return $this->modelLibrary->getInfo($where, $field);
    }
    
    /**
     * 图书删除
     */
    public function libraryDel($where = [])
    {
        
        $result = $this->modelLibrary->deleteInfo($where);
        
        $result && action_log('删除', '图书删除' . '，where：' . http_build_query($where));
        
        return $result ? [RESULT_SUCCESS, '删除成功'] : [RESULT_ERROR, $this->modelLibrary->getError()];
    }
}
