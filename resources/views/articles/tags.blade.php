@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <a href="#" class="btn btn-secondary">{{$tag->name}}</a>
        @endforeach
    </div>
@endif
