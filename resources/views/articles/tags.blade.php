@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
        <a href="{{route('articles.tags', $tag)}}" class="btn btn-secondary mb-1">{{$tag->name}}</a>
        @endforeach
    </div>
@endif
