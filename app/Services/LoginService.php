<?php

namespace App\Services;

use App\Repositories\LoginRepository;
class LoginService extends BaseService
{
    protected $loginRepository;

    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    //后台用户登录验证
    public function getUserInfo(array $data)
    {
        return $this->loginRepository->getUserInfo($data);
    }

    //条件查询（find）
    public function getUserData(array $data)
    {
        return $this->loginRepository->getByCondition($data);
    }

}
