<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class GuardianStep extends Model
{
    public $fillable = [
        'completed',
        'description',
        'article_id'
    ];
}
