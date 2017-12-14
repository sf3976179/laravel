<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $connection = 'mysql';
  /**
   * 与模型关联的数据表
   *
   * @var string
   */
  protected $table = 'users';
  protected $primaryKey = 'id'; //设定主键，默认主键为id


  public $timestamps = false;

  //开启白名单字段
  protected $fillable = ['id','name','user_login','user_image','address','user_phone','score','created_at','lastlogin_at'];








}
