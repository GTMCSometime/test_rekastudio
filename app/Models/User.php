<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $table = 'users';


    protected static function boot()
{
        parent::boot();
    
        static::creating(function ($user) {
            $user->api_token = $user->generateApiToken();
        });
}


public function generateApiToken(): string
{
    $user_data = $this->id . $this->email . $this->password;
    return hash('sha256', $user_data . Str::random(40));
}

public function tasks()
{
    return $this->hasMany(Task::class);
}
}
