<?php

namespace App\Http\Controllers;

use App\ValidateRule; //自动载入定义类验证
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $validateRule;
    public function __construct()
    {
        $this->validateRule = new ValidateRule();
    }
}
