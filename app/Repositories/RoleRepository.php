<?php

namespace App\Repositories;

use App\Models\Role;
use Hash;

class RoleRepository extends BaseRepository
{
    protected $baseModel;
    protected $company;

    public function __construct(Role $role)
    {
        $this->constructParam = func_get_args();
        $this->role = $role;
        $this->baseModel = $this->role;
        $this->baseParam = ['id', 'name', 'display_name', 'description'];
        $this->baseTransformer = 'role';
    }

    //角色列表
    public function getRoleCondition($input, $include=''){
        $where = [];
        $field = isset($input['field'])?$input['field']:'*';
        //过滤条件
        foreach ($this->baseParam as $param) {
                isset($input[$param]) ? $where[$param] = $input[$param] : null;
        }
        $rtn = $this->baseModel->where('name','!=','admin')->where($where)->get($field);
        return $rtn;
    }
}







