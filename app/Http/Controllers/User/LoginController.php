<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json([
                'message' => 'Логин/пароль некорректны'], 401);
        }
        
        return response()->json([
            'message'=> 'Вы вошли в аккаунт',
            'token' => Auth::user()->api_token], 201);
    }
}
