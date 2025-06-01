<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Client\Request;

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

    public function updateUser($request, User $user)
    {
        return app(TryService::class)(function () use ($request, $user){
            $user->update($request);
            return $user;
        });
    }
    public function deleteUser(User $user){
        return app(TryService::class)(function () use ($user){
            $user->delete();
        });
    }
}
