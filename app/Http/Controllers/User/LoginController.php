<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserLoginRequest;

class LoginController extends UserBaseController
{
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();
        // основная логика перенесена в сервис
        $response = $this->userLoginService->login($data);
        return $response;
    }
}
