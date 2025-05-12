<?php

namespace App\Service\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRegisterService  {

    public function register(array $data) {
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            

            DB::commit();

            return response()->json([
                'message' => 'Пользователь зарегистрирован'], 201);

        } catch(\Exception $exception) {

            DB::rollBack();
            return response()->json([
                'error' => 'Не удалось зарегистрироваться!',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}