<?php

namespace App\Services;

class ApiResponseService
{
    public ?string $message=null;
    public mixed $data=null;
    public int $statusCode=200;

    public function setMessage(string $message)
    {
        $this->message=$message;
    }
    public function setData(mixed $data){
        $this->data=$data;
    }
    public function setStatusCode(int $statusCode){
        $this->statusCode=$statusCode;
    }

    public function response()
    {
        $body=[];
        $this->message!=null && $body['message']=$this->message;
        $this->statusCode!=null && $body['statusCode']=$this->statusCode;
        $this->data!=null && $body['data']=$this->data;
        return response()->json($body,$this->statusCode);
    }
}
