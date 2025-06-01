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

    public function setUser($user)
    {
        return app(TryService::class)(function () use ($user){
            return User::create($user);
        });
    }
    public function getUser(User $user){
        return app(TryService::class)(function () use ($user){
            return $user;
        });
    }
}
