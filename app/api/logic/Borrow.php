<?php
namespace app\api\logic;
/**
 * 图书接口逻辑
 */
class Borrow extends ApiBase
{


    /**
     * 获取图书管理接口
     */
    public function getBorrowList()
    {  

    return $this->modelBorrow->getList();
    }
}
