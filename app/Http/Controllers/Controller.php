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

    // 返回错误的请求
    protected function errorBadRequest($validator)
    {
        // github like error messages
        // if you don't like this you can use code bellow
        //
        //throw new ValidationHttpException($validator->errors());

        $result = [];
        $messages = $validator->errors()->toArray();

        if ($messages) {
            foreach ($messages as $field => $errors) {
                foreach ($errors as $error) {
                    $result[] = [
                        'field' => $field,
                        'code' => $error,
                    ];
                }
            }
        }

        throw new ValidationHttpException($result);
    }

    protected function _setStatusCode($code)
    {
        $this->statusCode = $code;
        return $this;
    }

    protected function _out($err)
    {
        if(!is_array($err)){
            $err = ['code'=>$err];
        }
        //msg
        if(!isset($err['message'])){
            $err['message'] = '';
        }

        //debug
        if(!isset($err['data'])){
            $err['data'] = '';
        }
        return response()->json($err);
    }

    protected function _outSuccess($message=null,$data)
    {
        if ($data===null){
            return $this->_out(['code'=>200]);
        }else{
            return $this->_out(['code'=>200,'message'=>$message,'data'=>$data]);
        }
    }

    protected function _outError($message=null,$data)
    {
        if ($data===null){
            return $this->_out(['code'=>400]);
        }else{
            return $this->_out(['code'=>400,'message'=>$message,'data'=>$data]);
        }
    }

}
