<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserRegisterRequest;

class RegisterController extends UserBaseController
{
    public function register(UserRegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $response = $this->userRegisterService->register($data);
            return response()->json([
                'message' => 'Пользователь зарегистрирован',
                'data' => $response], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Ошибка регистрации',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}
