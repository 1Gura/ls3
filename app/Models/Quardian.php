<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Quardian extends Model
{
//    public $quarded = [];
    public $fillable = [
        'symbol_code',
        'title',
        'description',
        'body',
        'completed',
        'slug'
    ];
}
