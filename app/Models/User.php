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


public static function boot()
{
    parent::boot();
    
    static::creating(function ($user) {
        $user->api_token = Str::random(80);
    });
}

public function tasks()
{
    return $this->hasMany(Task::class);
}
}
