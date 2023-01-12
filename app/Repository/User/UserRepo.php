<?php

namespace App\Repository\User;

use App\Models\User;
use App\Repository\MainRepoInterface;
use App\Traits\ResponseForm;
use Symfony\Component\HttpFoundation\Response;

class UserRepo implements MainRepoInterface {
    use ResponseForm;

    public function create($request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'pin' => random_int(1000,9999),
        ]);

        return $this->returnData('user', $user, 'User has bee created successfully', Response::HTTP_CREATED);
    }
}

