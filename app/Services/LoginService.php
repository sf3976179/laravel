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

    public function getUserInfo(array $data)
    {
        return $this->loginRepository->getUserInfo($data);
    }


}
