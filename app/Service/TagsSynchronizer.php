<?php


namespace App\Service;


use App\Models\Article;
use App\Models\Tag;

class TagsSynchronizer
{
    public function sync(Tag $tagsRequest, Article $article)
    {
        $articleTags = $article->tags->keyBy('name');
        $syncIds = $articleTags->intersectByKeys($tagsRequest)->pluck('id')->toArray();
        $tagsToAttach = $tagsRequest->diffKeys($articleTags);
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $article->tags()->sync($syncIds);
    }
}
