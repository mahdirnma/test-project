<?php

namespace App\Services;

class ApiResponseBuilder
{
    private ApiResponseService $apiService;
    public function __construct()
    {
        $this->apiService=new ApiResponseService();
    }

    public function message(string $message)
    {
        $this->apiService->setMessage($message);
        return $this;
    }

    public function data (mixed $data,int $statusCode=200)
    {
        $this->apiService->setData($data);
        $statusCode!=200??$this->apiService->setStatusCode($statusCode);
        return $this;
    }

/*    public function statusCode(int $statusCode)
    {
        $this->apiService->setStatusCode($statusCode);
        return $this;
    }*/
    public function get()
    {
        return $this->apiService;
    }
    public function response()
    {
        return $this->apiService->response();
    }
}
