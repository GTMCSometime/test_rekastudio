<?php

namespace App\Service\User;

use Illuminate\Support\Facades\Auth;

class UserLoginService  {

    public function login(array $data) {
        
        if (!Auth::attempt($data)) {
            return response()->json([
                'message' => 'Логин/пароль некорректны'], 401);
        }
        
        return response()->json([
            'message'=> 'Вы вошли в аккаунт',
            'token' => Auth::user()->api_token], 201);
    }
}