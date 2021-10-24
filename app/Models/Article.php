<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }
}
