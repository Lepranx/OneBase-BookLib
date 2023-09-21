<?php
namespace app\common\model;

class Library extends ModelBase
{
    protected $table = 'book';
    protected $pk = "book_id";
    protected $autoWriteTimestamp = false;
}
