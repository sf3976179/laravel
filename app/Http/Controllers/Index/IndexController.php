<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Model\Article_content;
use App\Model\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class IndexController extends Controller{
  /*
  * 前台首页
  */
  public function index(){
    $result = Article_content::leftJoin('users','article_content.user_id','=','users.id')
                              ->where('article_content.article_id','>','0')
                              ->paginate('10');
    foreach ($result as $k1 => $v1){
      $ac_id = array();
      $ac_id = explode(',',$v1['ac_id']);
      $result1 = Article::where('id','=',$ac_id['0'])->first();
      $result[$k1]['ac_name'] = $result1['ac_name'];
    }

    return view('index.index')->with('article_data',$result);
  }

  /*
  * 文章详情
  */
  public function article_info($id){
    $data = Article_content::where('article_id','=',$id)->first();
    $tag_name = array();
    $tag_name = explode(',',$data['ac_tag']);
    return view('index.article')->with('article_info',$data)
                                ->with('tag_name',$tag_name);
  }











}
