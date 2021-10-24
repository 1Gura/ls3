@php
    $tags = $tags ?? collect();
@endphp
@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <a href="{{route('tags.show', $tag)}}" class="list-group-item list-group-item-primary">{{$tag->name}}</a>
        @endforeach
    </div>
@endif
