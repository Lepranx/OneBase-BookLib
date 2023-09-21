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
class Book extends AdminBase
{
    
    /**
     * 获取图书列表
     */
    public function getBookList($where = [], $field = true, $order = '', $paginate = 0)
    {
        $this->modelBook->alias('b');
        $join=[['author a','b.author=a.code']];
        $field='b.*,a.name as sname';
        $this->modelBook->join =$join;
        return $this->modelBook->getList($where, $field, $order, $paginate);
    }
    
    /**
     * 图书信息编辑
     */
    public function bookEdit($data = [])
    {
        
        $validate_result = $this->validateBook->scene('edit')->check($data);
        
        if (!$validate_result) {
            
            return [RESULT_ERROR, $this->validateBook->getError()];
        }
        
        $url = url('bookList');
        
        $result = $this->modelBook->setInfo($data);
        
        $handle_text = empty($data['id']) ? '新增' : '编辑';
        
        $result && action_log($handle_text, '图书' . $handle_text . '，name：' . $data['name']);
        
        return $result ? [RESULT_SUCCESS, '操作成功', $url] : [RESULT_ERROR, $this->modelBook->getError()];
    }

    /**
     * 获取图书信息
     */
    public function getBookInfo($where = [], $field = true)
    {
        
        return $this->modelBook->getInfo($where, $field);
    }
    
    /**
     * 图书删除
     */
    public function bookDel($where = [])
    {
        
        $result = $this->modelBook->deleteInfo($where);
        
        $result && action_log('删除', '图书删除' . '，where：' . http_build_query($where));
        
        return $result ? [RESULT_SUCCESS, '删除成功'] : [RESULT_ERROR, $this->modelBook->getError()];
    }
}
