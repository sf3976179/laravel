<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article_content extends Model
{
  /**
   * 与模型关联的数据表
   *
   * @var string
   */
  protected $table = 'article_content';
  protected $primaryKey = 'article_id';


  public $timestamps = false;

  //开启白名单字段
  protected $fillable = ['article_id','ac_id', 'main_title','subtitle','ac_tag','image_name','ac_display','content','add_time'];






}
