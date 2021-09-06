<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Quardian
{
    use HasFactory;
    public static function completed()
    {
        return static::where('completed', 1)->get();
    }
}
