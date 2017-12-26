<?php

namespace App\Services;

use App\Repositories\RoleRepository;
class RoleService extends BaseService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    //角色增加
    public function createRole(array $data){
        if(is_array($data)) $input=array('name'=>$data['name'],'display_name'=>$data['display_name'],'description'=>$data['description']);
        $res = $this->roleRepository->create($input);
        return $res->instanceId;
    }

    //获取角色列表（分页）
    public function getRoleList(array $data){
        return $this->roleRepository->getListByCondition($data);
    }

    //编辑角色
    public function findId($id){
        return $this->roleRepository->getById($id);
    }

    //根据条件筛选
    public function getRoleCondition(array $where){
        return $this->roleRepository->getRoleCondition($where);
    }

    //管理员添加分配权限
    public function createAdmin(array $input){
        dd($input);
        $admin_data = array(
            'name' => $input['name'],
            'user_login' => $input['user_login'],
            'password' => Hash::make($input['password']),
            'user_phone' => $input['user_phone']
        );



    }



}
