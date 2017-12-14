<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  /**
   * 文章分类表
   *
   * @var string
   */
  protected $table = 'article';

  public $timestamps = false;
    /**
     * 获取与用户关联的电话号码
     * 一对一关联
     */
    // public function phone(){
    //     return $this->hasOne('App\Phone');
    // }





}
