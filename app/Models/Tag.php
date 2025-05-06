<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    public static $rules = [
        'title' => 'required|string|min:3|max:20',
    ];
    protected $table = 'tags';
}
