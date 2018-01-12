<?php

namespace App\Repositories;

use App\Models\Users;
use Hash;

class LoginRepository extends BaseRepository
{
    protected $baseModel;

    public function __construct(Users $users)
    {
        $this->constructParam = func_get_args();
        $this->users = $users;
        $this->baseModel = $this->users;
        $this->baseParam = ['id','name','user_login','user_image','address','user_phone','score','created_at','lastlogin_at'];
        $this->baseTransformer = 'users';
    }

    /**
     * 获取当前用户信息
     *
     * @access public
     * @param mixed $request post发送过来的用户数据
     * @need transformers不懂
     * @since 2017/12/12 SF
     * @return json
     */
    public function getUserInfo($input, $include='')
    {
        $rtn = Users::where('user_login','=',$input['user_login'])->first();
        $info = [];
        if(Hash::check($input['password'],$rtn->password)){
            //不懂
            //$info = $this->transformCollectionData($rtn, $this->baseTransformer, $include);
            session(['user_login' => $rtn->user_login]);
            session(['name' => $rtn->name]);
            session(['user_id' => $rtn->id]);
            session(['user_image_name' => $rtn->user_image_name]);
            $info = '1';
        }else{
            $info = '';
        }
        return $info;
    }



}