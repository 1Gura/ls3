<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
//    public $quarded = [];
    public $fillable = [
        'title',
        'description',
        'body',
        'completed',
        'slug',
        'user_id'
    ];
}
