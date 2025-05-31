<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getUsers()
    {
        return app(TryService::class)(function (){
            return User::all();
        });
    }
}
