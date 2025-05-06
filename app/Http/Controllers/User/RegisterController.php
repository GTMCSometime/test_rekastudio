<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRegisterRequest;

class RegisterController extends UserBaseController
{
    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();
        // основная логика перенесена в сервис
        $response = $this->registerService->register($data);
        return $response;
    }
}
