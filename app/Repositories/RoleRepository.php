<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\Users;
use Hash;
use Illuminate\Support\Facades\DB;

class RoleRepository extends BaseRepository
{
    protected $baseModel;
    protected $company;

    public function __construct(Role $role,Users $users)
    {
        $this->constructParam = func_get_args();
        $this->role = $role;
        $this->users = $users;
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

    //管理员添加
    public function createAdmin(array $data){
        $admin_data = array(
            'name' => $data['name'],
            'user_login' => $data['user_login'],
            'password' => Hash::make($data['password']),
            'user_phone' => $data['user_phone'],
            'user_image' => $data['user_img'],
            'created_at' => time(),
            'updated_at' => time(),
            'user_type' => '2'
        );
        // 管理员用户插入
        $result = $this->users->create($admin_data);
        if($result){
            $role_data = [];
            foreach($data['role_id'] as $k => $v){
                $role_data[$k]['user_id'] = $result->id;
                $role_data[$k]['role_id'] = $v;
            }
            //存储角色表插入
            $res = DB::table('role_user')->insert($role_data);
            if($res){
                return $res;
            }
        }
    }

    //管理员列表
     public function getAdminList($where){
        //取出关联数据
        $res = DB::table('user as u')
            ->leftJoin('role_user as r','u.id','=','r.user_id')
            ->leftJoin('roles as o','r.role_id','=','o.id')
            ->select('u.id',
                     'u.name',
                     'r.user_id',
                     'r.role_id',
                     'o.id',
                     'o.display_name',
                     'o.description'
                )
            ->where('u.user_type','=','2')
            ->paginate($where['page_num'])
            ->toArray();
        //数据整理
        $column = array_column($res['data'],'user_id');
        $result = array();
        //数据整理
        foreach($res['data'] as $k => $v){
                    $result[$v->user_id]['role_id'][] = $v->id; //角色id
                    $result[$v->user_id]['name'] = $v->name; //会员呢称
                    $result[$v->user_id]['user_id'] = $v->user_id; //会员id
                    $result[$v->user_id]['display_name'][] = $v->display_name; //角色关键字
                    $result[$v->user_id]['description'][] = $v->description; //角色描述
        }
        return $result;
    }


}







