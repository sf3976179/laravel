<?php

namespace App\Http\Controllers\Admin;

use Validator; //验证类
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Services\RoleService;
use App\Models\Admin_interface_menu;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    private $roleService;
    /*
     * @need 中间件补充
     * **/
    public function __construct(RoleService $roleService)
    {
        parent::__construct();
        $this->roleService = $roleService; //角色容器
        //接口调用菜单
        $interface_menu = Admin_interface_menu::where('id', '>','0' )->get();
        $this->interface_menu = $interface_menu;
    }

    /**
     * 管理员列表
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/20 SF
     * @return json
     */
    protected function admin_list(){
        return view('admin.admin_list')->with('interface_menu',$this->interface_menu);
    }

    /**
     * 角色列表
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/20 SF
     * @return json
     */
    protected function role_list(){
        $where = array(
            'field' => 
        );
        $this->roleService->getRoleList($where);
        return view('role.role_list')->with('interface_menu',$this->interface_menu);
    }

    /**
     * 添加角色
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/20 SF
     * @return json
     */
    protected function role_add(){
        return view('role.role_add')->with('interface_menu', $this->interface_menu);
    }

    /**
     * 添加角色(post)
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/21 SF
     * @return json
     */
    protected function role_add_submit(Request $request){
        if($request->isMethod('post')){
            $data_info = array(
                'name' => $request->input()['name'],
                'display_name' => $request->input()['display_name']
            );
            $validator = Validator::make($data_info, $this->validateRule->getRule('role.add'));

            if ($validator->fails()) {
                return $this->_outError($validator->errors()->all(),'');
            }
            $res = $this->roleService->createRole(Input::get());
            if($res){
                return $this->_outSuccess('添加成功','');
            }else{
                return $this->_outSuccess('添加失败','');
            }

        }
    }






}