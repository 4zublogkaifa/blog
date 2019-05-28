<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Praise extends Model
{
    //
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'praise';

    /**
     * 与模型关联的数据表的主键。
     *
     * @var string
     */
//    protected $primaryKey = 'title_id';

    /**
     * 执行模型是否自动维护时间戳.
     *
     * @var bool
     */
    public $timestamps = false;
}
