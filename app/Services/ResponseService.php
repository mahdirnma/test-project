<?php

namespace App\Services;

class ResponseService
{
    public function __construct(public string $success,public mixed $data)
    {

    }
}
