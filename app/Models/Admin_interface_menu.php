<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/10/17
 * Time: 17:29
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_interface_menu extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'admin_interface_menu';

    //可被批量赋值的字段
    protected $fillable = [
        'p_id','name'
    ];

    // 取消自动维护
    public $timestamps = false;

}