<?php
/**
 * Created by PhpStorm.
 * User: SF
 * Date: 2018/2/5
 * Time: 16:10
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Integer_goods extends Model
{
    /**
     * 文章分类表
     *
     * @var string
     */
    protected $table = 'Integer_goods';
    //没有指定的话，默认使用 mysql
    protected $connection = 'mysql_two';

    public $timestamps = false;





}
