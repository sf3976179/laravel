<?php

namespace App;



class ValidateRule
{
    protected $rules = [
        //后台会员登录
        'user.login'=>[
            'user_login' => 'required|string|max:20',
            'password' => 'required|string|max:50',
        ],
        //角色添加
        'role.add'=>[
            'name' => 'required|string|max:20',
            'display_name' => 'required|string|max:50',
        ],
        //管理员添加
        'admin.add'=>[
            'name' => 'required|string|max:30',
            'user_login' => 'required|string|max:20',
            'password' => 'required|string',
            'user_phone' => 'required',
            'role_id' => 'required|array'
        ],


        'item.store'=>[
            'item_ref' => 'required|string|max:50',
            'name' => 'string|max:100',
//            'unit_number' => 'required|integer',
//            'unit_name' => 'required|string|max:50',
            //'shelve' => 'required|integer',
            //'disable' => 'required|integer',
            //'itemgroups' => 'required|array',
            'skus' => 'required|array',
//            'shops' => 'required|array',
        ],
        'item.update'=>[
            'item_ref' => 'required|string|max:50',
            'name' => 'string|max:100',
            'unit_number' => 'required|integer',
            'unit_name' => 'required|string|max:50',
            'shelve' => 'required|integer',
            'disable' => 'required|integer',
            'itemgroups' => 'required|array',
            'skus' => 'required|array',
            'shops' => 'required|array',
        ]
    ];

    public function getRule($ruleName='')
    {
        if (isset($this->rules[$ruleName])){
            return $this->rules[$ruleName];
        }else{
            return [];
        }
    }
}
