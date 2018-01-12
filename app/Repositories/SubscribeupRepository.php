<?php

namespace App\Repositories;

use App\Models\Subscribe_up;

class SubscribeupRepository extends BaseRepository
{
    protected $baseModel;

    public function __construct(Subscribe_up $subscribe_up)
    {
        $this->constructParam = func_get_args();
        $this->subscribe_up = $subscribe_up;
        $this->baseModel = $this->subscribe_up;
        $this->baseParam = ['id','up_id','user_id'];
        $this->baseTransformer = 'subscribe_up';
    }

    //获取订阅Up主的用户信息
    public function getUpList(array $condition){
        $rtn = $this->baseModel->where($condition)->get()->toArray();
        return $rtn;
    }
}