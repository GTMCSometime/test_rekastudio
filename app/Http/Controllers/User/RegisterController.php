<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserRegisterRequest;

class RegisterController extends UserBaseController
{
    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();
        // основная логика перенесена в сервис
        $response = $this->userRegisterService->register($data);
        return $response;
    }
}
