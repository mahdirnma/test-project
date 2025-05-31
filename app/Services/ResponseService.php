<?php

namespace App\Services;

class ResponseService
{
    public function __construct(public string $message,public mixed $data)
    {

    }
}
