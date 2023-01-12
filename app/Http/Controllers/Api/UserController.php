<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Repository\User\UserRepo;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }

    public function create(CreateUserRequest $request)
    {
        return $this->user->create($request);
    }
}
