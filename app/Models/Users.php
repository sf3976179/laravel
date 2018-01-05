<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Users extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    protected $connection = 'mysql';
  /**
   * 与模型关联的数据表
   *
   * @var string
   */
  protected $table = 'user';
  protected $primaryKey = 'id'; //设定主键，默认主键为id


  public $timestamps = false;

  //开启白名单字段
  protected $fillable = ['id','name','user_login','password','user_image','address','user_phone','score','created_at','lastlogin_at'];








}
