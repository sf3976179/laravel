<?php
/**
 * Created by SF.
 * User: SF
 * 后台接口调用模块
 * Date: 2017/10/18
 * Time: 10:00
 */
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Admin_interface_menu;
use App\Http\Controllers\Controller;

class InterfaceMenuController extends Controller
{
    public function __construct()
    {
        //接口调用菜单
        $interface_menu = Admin_interface_menu::where('id', '>','0' )->get();
        $this->interface_menu = $interface_menu;
    }

    /**
     * 接口调用模块
     *
     * @access public
     * @param $id
     * @since 2017/10/18 SF
     * @return array
     */
    public function menu($id){
        $menu_data = Admin_interface_menu::where('id','=',$id)->first();
        $menu_data['parent_name'] =  Admin_interface_menu::where('id','=',$menu_data['p_id'])->first()['name'];
        // 数据整理
        $result = json_decode($menu_data['data'],true);

        $menu_data['headers'] = $this->array_explode($result['headers']); //headers
        $menu_data['body'] = $this->array_explode($result['body']); //body
        $menu_data['Description'] = $result['Description']; //Description

        return view('admin.interface_menu')->with('menu_data',$menu_data)
                                                 ->with('interface_menu',$this->interface_menu);
    }


    /**
     * 接口数据信息整理
     */
    public function array_explode($array){
        $result = explode(',',$array);
        foreach ($result as $k1 => $v1) {
            $res[] = explode('-',$v1);
        }
        return $res;
    }

    /**
     * 接口数据发送
     *
     * @access public
     * @param $request
     * @since 2017/10/20 SF
     * @return array
     */
    public function interfaceSend(Request $request){
        $data = $request->all();

        $header = $this->interfaceDataMake($data['headers']);
        $body = $this->interfaceDataMake($data['body']);
        $ch = curl_init();
        //设置header
        curl_setopt($ch, CURLOPT_HEADER,$header);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL,$data['url']);
        if($data['type'] == 'POST'){
            //设置发送方式：post
            curl_setopt($ch, CURLOPT_POST, true);
            //设置发送数据
            curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        }
        //抓取URL并把它传递给浏览器
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    // 接口发送数据整理
    public function interfaceDataMake($data){
        $res = explode('^',$data);
        foreach($res as $k1 => $v1){
            $res1 = explode('-',$v1);
            $res2[$res1['0']] = $res1['1'];
        }
        return $res2;
    }
}