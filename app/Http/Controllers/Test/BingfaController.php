<?php
/**
 * Created by PhpStorm.
 * User: SF
 * Date: 2018/2/5
 * Time: 11:08
 */
namespace App\Http\Controllers\Test;

use App\Services\ArticleService; //文章服务容器
use App\Models\Admin_interface_menu;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BingfaController extends Controller
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
        return view('test.bingfa')->with('interface_menu',$this->interface_menu);
    }

    //跨库查询
    public function bingfa(){
//        return DB::connection('mysql1')->table('integer_goods')->get();
        $keywords = '10000';
        return DB::connection('mysql1')
                ->table('integer_goods as a')
                ->join('integer_goods_spec_key as b', function ($join) use($keywords){ //闭包
                     $join->on('a.id', '=', 'b.goods_id')
                     ->where('b.attr_key_id', '<', $keywords);
                })
                ->select('a.id','a.goods_name')
                ->get();
    }


}
