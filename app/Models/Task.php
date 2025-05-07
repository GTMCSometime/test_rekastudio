<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    protected $table = 'tasks';
    protected $fillable = [
        'user_id',
        'title',
        'text',
    ];
    public static $rules = [
        'title' => 'required|string|min:3|max:20',
    ];


public function user()
{
    return $this->belongsTo(User::class);
}

public function tags()
{
    return $this->belongsToMany(Tag::class);
}
}
