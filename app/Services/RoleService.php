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

    //获取角色列表
    public function getRoleList(array $data){

    }

}
