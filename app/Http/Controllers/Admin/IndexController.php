<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\LoginService;
use App\Models\Article_content;
use App\Models\Article;
use App\Models\Users;
use App\Models\Role;
use App\Models\Admin_interface_menu;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use OSS\OssClient;

class IndexController extends Controller{
    private $loginServie; //login服务容器

    public function __construct(LoginService $loginService)
    {
        parent::__construct();
        $this->loginService = $loginService;
        //接口调用菜单
        $interface_menu = Admin_interface_menu::where('id', '>','0' )->get();
        $this->interface_menu = $interface_menu;
    }

  /*
  * 博客后台首页控制器
  * 首先判断当前是否登录
  */
  public function index(){
      $user = Users::where('user_login', '=', 'admin')->first();
//      $res = $user->ability('admin,owner', 'create-post,edit-user');
//      $res1 = $user->hasRole(['owner', 'admin']); // true
//      $res2 = $user->can(['edit-user', 'create-post']); // true

    $user = session()->all();
    $user_info = $this->loginService->getUserData(array('user_login'=>$user['user_login']));
    // 如果当前用户不存在，返回登录界面重新登录
    if(!$user_info){
      return redirect('post/form_submit')
                  ->withErrors('请重新登录')
                  ->withInput();
    }

    // 查询所有文章分类
    $article = DB::table('article')->get();
    $article_data = array();
    $article_data = $article->toArray();

    return view('admin.index')->with('user_name',$user_info->name)
                                    ->with('article',$article_data)
                                    ->with('interface_menu',$this->interface_menu);
  }

  /*
  * 文章管理
  */
  public function article_list(Request $request){

       //判断接值
       if($request->isMethod('post')){
           //接值
           $data=Input::get();
           $username=$data['username'];
           $pwd=$data['pwd'];
           //获取全部
           $flights = Article_content::all();
           $list1=Article_content::get()->toArray();
           $res=Article_content::where('username', '=',$username )->where('pwd', '=', $pwd)->first()->toArray();
           print_r($list1);
           exit;
       }

    // $result=Article_content::where('id', '>','0' )->get()->toArray();
    $result=Article_content::where('article_id', '>','0' )->paginate('10');
    foreach ($result as $k1 => $v1){
      $ac_id = array();
      $ac_id = explode(',',$v1['ac_id']);
      $result1 = Article::where('id','=',$ac_id['0'])->first();
      $result[$k1]['ac_name'] = $result1['ac_name'];
    }

    return view('admin.article_list')->with('article',$result)->with('interface_menu',$this->interface_menu);
  }

  // 文章增加详情页
  public function add_article(Request $request){
    $result = $request->all();
    if($request->isMethod('post')){
      var_dump($request->all());die;
    }
    if($request->all()){
      if($result['a'] == '1'){
        return json_encode('1');
      }
    }
    $article = Article::where('id', '>','0' )->get();
    // 增加文章
    return view('admin.article_add')->with('article',$article)->with('interface_menu',$this->interface_menu);
  }

  // 文章增加提交方法
  public function add_article1(Request $request){
      // 接受发送请求
      if($request->all()){
        $result = $request->all();
        if($result['type'] == 'ajax'){
          // 查询一级下的二级
          $article_list = Article::where('ac_parent_id','=',$result['id'])->get()->toArray();
          exit(json_encode($article_list));
        }else if($result['type'] == 'article_add'){
          //文章增加
          $user = session()->all();
          $data = array(
            'id' => $user['user_id'],
            'main_title' => $result['first_title'],
            'image_name' => $result['image_upload'],
            'subtitle' => $result['second_titile'],
            'ac_id' => $result['article_list1'].','.$result['article_list2'],
            'ac_tag' => $result['tags_1'],
            'ac_display' => $result['display'],
            'content' => $result['editorValue'],
            'add_time' => time()
          );

          if(Article_content::create($data)){
            return $data = array('message'=>'文章增加成功');
          }else{
            return $data = array('message'=>'文章增加失败');
          }
        }
      }
  }

  //图片上传方法
	public function ajaxfileupload(Request $request){
        $result = $request->all();
        // 当其为表单提交 跳转到另外方法
        if($request['form_sign'] == '1'){
          $request['type'] = 'article_add';
          $result = $this->add_article1($request);

          return view('index.message')->with([
                  'message'=>$result['message'],
                  'url' =>'/laravel/public/article_list',
                  'name'=>'文章列表',
                  'jumpTime'=>2,
              ]);

        }else{
        // echo $_POST;

            $alioss = config('alioss'); //oss配置数据
            $ossClient = new OssClient($alioss['AccessKeyId'],$alioss['AccessKeySecret'],$alioss['ossServer']);
//
            try {
                $options = array(
                    OssClient::OSS_FILE_DOWNLOAD => $_FILES['mypic']['name'],
                    OssClient::OSS_PROCESS => "image/watermark,text_SGVsbG8g5Zu-54mH5pyN5YqhIQ"
                );
                $ossClient = new OssClient($alioss['AccessKeyId'],$alioss['AccessKeySecret'],$alioss['ossServer']);
                $result = $ossClient->multiuploadFile($alioss['BucketName'],'oss_huadong1/'.$_FILES['mypic']['name'],$_FILES['mypic']['tmp_name'],$options);

//                $ossClient->uploadFile($alioss['BucketName'],'oss_huadong1/'.$_FILES['mypic']['name'],$_FILES['mypic']['tmp_name']);

//                $res = $ossClient->getObject($alioss['BucketName'],'oss_huadong1/'.$_FILES['mypic']['name'],$options);
//                $ossClient->deleteObject($alioss['BucketName'],'oss_huadong1/'.$_FILES['mypic']['name']);
            } catch (OssException $e) {
                print $e->getMessage();
            }




//          $picname = $_FILES['mypic']['name'];
//          $picsize = $_FILES['mypic']['size'];
//          if ($picname != "") {
//              if ($picsize > 5120000) { //限制上传大小
//                  echo json_encode('图片大小不能超过5000k');
//                  exit;
//              }
//              $type = strstr($picname, '.'); //限制上传格式
//              if($type != ".psd" && $type != ".png" && $type != ".swf" && $type != ".jpg" && $type != ".zip" && $type != ".jpeg" && $type != ".svg"){
//                  echo json_encode('图片格式不对！');
//                  exit;
//              }
//              $rand = rand(100, 999);
//              $pics = date("YmdHis") . $rand . $type; //命名图片名称
//              //上传路径
//              // $pic_path = __PUBLIC__.$pics;
//              $pic_path1 = $_SERVER['DOCUMENT_ROOT'].'/laravel/public/printing/'.$pics;
//              $pic_path = 'http://'.$_SERVER['SERVER_NAME'].'/laravel/public/printing/'.$pics;
//              move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path1);
//              // $_SESSION['print_path'] = $pic_path;
//              // $_SESSION['print_number'] = $pics;
//
//
//
//
//          }
//          $size = round($picsize/1024,2); //转换成kb
//          $arr = array(
//              'name'=>$pics,
//              'pic'=>$pics,
//              'size'=>$size,
//              'print_path'=>$pic_path,
//              'print_number'=>$pics,
//          );
//          echo json_encode($arr); //输出json数据









        }
		}

    // 文章编辑
    public function article_edit($id){
      $article = DB::table('article')->get()->toArray();
      $data = Article_content::where('article_id','=',$id)->first();

      $ac_id = array();
      $ac_id = explode(',',$data['ac_id']);
      $result1 = Article::where('id','=',$ac_id['0'])->first();
      $result2 = Article::where('id','=',$ac_id['1'])->first();
      $data['ac_name1'] = $result1['ac_name'];
      $data['ac_name2'] = $result2['ac_name'];

      return view('admin.article_edit')->with('article_info',$data)
                                       ->with('article',$article)->with('interface_menu',$this->interface_menu);
    }

    // 会员组
    public function users_list(){
      $users = Users::where('id', '>','0' )->paginate('9');
      return view('admin.users_list')->with('users',$users)->with('interface_menu',$this->interface_menu);
    }

    // 会员编辑
    public function user_edit($user_id){
      $user = Users::where('id','=',$user_id)->first();
      return view('admin.user_edit')->with('user_info',$user)->with('interface_menu',$this->interface_menu);
    }

    // 会员编辑提交
    public function user_info_edit(Request $request){
      //判断接值
      if($request->isMethod('post')){
          //接值
          $data=Input::get();
          $user = Users::where('id','=',$data['user_id'])->first();
          $user->name = $data['user_name'];
          $user->user_sex = $data['user_sex'];
          $user->user_image = $data['image_upload'];
          $user->address = $data['user_address'];
          $user->user_phone = $data['user_phone'];
          $user->user_tag = $data['user_tags'];
          $user->remember_token = $data['_token'];
          $user->user_profile = $data['editorValue'];

          if($user->save()){
            $result = array('message'=>'会员编辑成功');
          }else{
            $result = array('message'=>'会员编辑失败');
          }
          return view('index.message')->with([
                  'message'=>$result['message'],
                  'url' =>'/laravel/public/users',
                  'name'=>'会员列表',
                  'jumpTime'=>2,
              ]);
      }
    }

    // 说说、轮播图、链接设置
    public function index_setting(){
      var_dump('12');die;
    }




    /**
     * redis入门
     */
    public function test(){
        $test = 'test';
        Redis::set($test,'123');

//      Redis::del($test);
        $a = Redis::get($test);

        //存储数据到列表中
        Redis::lpush("test1", "Redis");
        Redis::lpush("test1", "Mongodb");
        Redis::lpush("test1", "Mysql");
        // 获取存储的数据并输出
//      $arList = Redis::lrange("test1", 0 ,-1);

        $arList = Redis::keys("*");


        /*
         * 集合begin
         * */
        $posts = [
            'name' => '张三',
            'age' => '18',
            'aa' => '11',
            'bb' => '22',
            'cc' => '33'
        ];

        foreach ($posts as $post) {
            //将文章标题存放到集合中
            Redis::sadd('aaa',$post);
        }

        //获取集合元素总数(如果指定键不存在返回0)
        $nums = Redis::scard('aaa');

        if($nums>0){
            //从指定集合中随机获取三个标题
            $post_titles = Redis::srandmember('aaa',3);
//          dd($post_titles);
        }
        //集合end

        //消息队列
        $data = ['02','11','21','31','41','51'];
        $now_time = date("Y-m-d H:i:s");

        foreach($data as $k =>$v){
            //入队列
            Redis::rPush("call_log",$v."%".$now_time);
        }

        $length = Redis::lLen('call_log');
        $call_log_data = Redis::LRANGE('call_log','0','-1'); //redis
//      Redis::DEL('call_log');
//      var_dump($call_log_data);die;

        //list类型出队操作
        $value = Redis::lpop('call_log');
        if($value){
            echo "出队的值".$value;
        }else{
            echo "出队完成";
        }
//      die;
    }




}
