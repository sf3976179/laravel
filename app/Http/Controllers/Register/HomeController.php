<?php

namespace App\Http\Controllers\Register;

use Validator;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * 首页 后台用户登录页面
     */
    public function index()
    {
        return view('register.index');
    }

    // 后台用户注册页面
    public function register(){
      return view('register.register');
    }

    // 注册提交验证
    public function register_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password'=>'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        // 如果不满足验证请求返回错误信息
        if ($validator->fails()) {
            return redirect('post/form_submit')
                        ->withErrors($validator)
                        ->withInput();
        }else{
          $result = $request->all();
          DB::table('users')->insert([
            'name' => $result['name'],
            'email' => $result['email'],
            'password' => Hash::make($result['password'])
          ]);
        }
    }

    // 登陆提交验证
    public function loginin(Request $request){
      // 获取所有提交过来的数据
      $result = $request->all();
      // DB::insert('insert into users (name,email,password) values (11',$result['email'],$result['password'].')', [1, 'Dayle@163.com','123456']);

      // 查询一条数据
      $user = DB::table('users')->where('email','=',$result['email'])->first();
      //判断登录当前密码,密码匹配
      if (Hash::check($result['password'], $user->password))
      {
        $request->session()->put('email',$user->email);
        $request->session()->put('name',$user->name);
        $request->session()->put('user_id',$user->id);
        $request->session()->put('user_image_name',$user->user_image);
        // return redirect()->route('admin_index',['id'=>'2']);
        // 跳转到后台管理员首页
        return redirect()->route('admin_index');
      }else{
          return redirect('post/form_submit')
                      ->withErrors('请重新登录')
                      ->withInput();
      }
    }

    //报错信息返回方法
    public function create(){
        return view('register.error');
    }

}
