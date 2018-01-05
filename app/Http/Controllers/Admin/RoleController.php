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
        $interface_menu = Admin_interface_menu::where('id', '>', '0')->get();
        $this->interface_menu = $interface_menu;
    }

    /**
     * 角色列表
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/20 SF
     * @return json
     */
    protected function role_list()
    {
        $where = array(
            'field' => '*',
            'page_num' => '10'
        );
        $result = $this->roleService->getRoleList($where); //角色列表
        return view('role.role_list')->with('role_data', $result)
            ->with('interface_menu', $this->interface_menu);
    }

    /**
     * 添加角色
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/20 SF
     * @return json
     */
    protected function role_add()
    {
        return view('role.role_add')->with('interface_menu', $this->interface_menu);
    }

    /**
     * 编辑角色
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/25 SF
     * @return json
     */
    protected function role_edit($role_id)
    {
        $role_data = $this->roleService->findId($role_id);
        return view('role.role_add')->with('role_data', $role_data)
            ->with('interface_menu', $this->interface_menu);
    }

    /**
     * 添加/编辑角色(post)
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/21 SF
     * @return json
     */
    protected function role_add_submit(Request $request)
    {
        if ($request->isMethod('post')) {
            $data_info = array(
                'name' => $request->input()['name'],
                'display_name' => $request->input()['display_name']
            );
            $validator = Validator::make($data_info, $this->validateRule->getRule('role.add'));

            if ($validator->fails()) {
                return $this->_outError($validator->errors()->all(), '');
            }
            $res = $this->roleService->createRole(Input::get());
            if ($res) {
                return $this->_outSuccess('添加成功', '');
            } else {
                return $this->_outSuccess('添加失败', '');
            }

        }
    }

    /**
     * 管理员列表
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/25 SF
     * @return data
     */
    protected function admin_list()
    {
        $where = array(
            'page_num' => '10'
        );
        $result = $this->roleService->getAdminList($where); //管理员列表
        return view('role.admin_list')->with('admin_data', $result)
                                      ->with('interface_menu', $this->interface_menu);
    }

    /**
     * 管理员添加
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/25 SF
     * @return data
     */
    protected function admin_add()
    {
        $condition = array(
            'field' => array('id', 'name')
        );
        //角色列表
        $role_data = $this->roleService->getRoleCondition($condition);
        return view('role.admin_add')->with('role_data', $role_data)
            ->with('interface_menu', $this->interface_menu);
    }

    /**
     * 管理员添加（post）
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @since 2017/12/26 SF
     * @return data
     */
    protected function admin_add_submit(Request $request)
    {
        $validator = Validator::make($request->input(), $this->validateRule->getRule('admin.add'));

        if ($validator->fails()) {
            return $this->_outError($validator->errors()->all(), '');
        }
        $res = $this->roleService->createAdmin(Input::get());
        if($res){
            return redirect()->route('admin_list');
        }else{
            return redirect('admin_add')
                ->withErrors('请重新填写')
                ->withInput();
        }
    }







}