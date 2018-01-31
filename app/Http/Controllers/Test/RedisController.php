<?php

namespace App\Http\Controllers\Test;

use App\Services\ArticleService; //文章服务容器
use App\Models\Admin_interface_menu;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;

class RedisController extends Controller
{
    public function __construct(ArticleService $articleService)
    {
        parent::__construct();
        $this->articleService = $articleService; //文章
        //接口调用菜单
        $interface_menu = Admin_interface_menu::where('id', '>','0' )->get();
        $this->interface_menu = $interface_menu;
    }

    public function index()
    {
        return view('test.redis')->with('interface_menu',$this->interface_menu);
    }

    public function youxu_redis(){
//        $a = Redis::zrange('myzset','0','-1');
        Redis::DEL('myzset');

//        Redis::zrangebyscore
    }

}
