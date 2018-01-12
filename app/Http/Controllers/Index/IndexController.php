<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Models\Article_content;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Services\ArticleService; //文章

class IndexController extends Controller{

    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        parent::__construct();
        $this->articleService = $articleService;
    }

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

  /**
   * 订阅up主（redis队列、订阅）
   *
   * @access public
   * @param mixed $request post发送过来的用户数据
   * @since 2018/1/10 SF
   * @return json
   */
  public function upSubscribe(Request $request){
      $request->session()->put('member_id','5');
      $up_array = array(
          'up_id' => $request->input('user_id'), //UP主id
          'member_id' => session()->get('member_id') //当前登录会员id
      );

      $res = $this->articleService->createUp($up_array);

//      $res = Redis::publish('test-channel', json_encode(['foo' => 'bar']));

  }











}
