<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\ApiResponseBuilder;
use App\Services\UserService;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public UserService $service){}

    public function index()
    {
        $results = $this->service->getUsers();
        return (new ApiResponseBuilder())->data(UserResource::collection($results->data))->response();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $result=$this->service->setUser($request->validated());
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('user added successfully')->data(new UserResource($result->data)):
            (new ApiResponseBuilder())->message('user not added')->data($result->data);
        return $apiResponse->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $result=$this->service->getUser($user);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('user founded successfully')->data(new UserResource($result->data)):
            (new ApiResponseBuilder())->message('user not found')->data($result->data);
        return $apiResponse->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
