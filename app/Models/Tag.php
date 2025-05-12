<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    
    public $timestamps = false;
    protected $fillable = [
        'title',
    ];
    public static $rules = [
        'title' => 'required|string|min:3|max:20',
    ];
    protected $table = 'tags';
}
