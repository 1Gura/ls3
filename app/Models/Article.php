<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Guardian
{
    use HasFactory;
    use Sluggable;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function completed()
    {
        return static::where('completed', 1)->get();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
