<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  /**
   * 与模型关联的数据表
   *
   * @var string
   */
  protected $table = 'users';
  protected $primaryKey = 'id';


  public $timestamps = false;

  //开启白名单字段
  protected $fillable = ['id','name','email','user_image','address','user_phone','score','created_at','lastlogin_at'];








}
