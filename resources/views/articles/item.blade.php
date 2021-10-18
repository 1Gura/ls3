<li>
    <h3>
        <a href="{{route('articles.show', [$article->slug])}}">
            {{$article->title}}
        </a>
    </h3>
    <p>{{$article->body}}</p>
    <p>Дата публикации: {{$article->created_at->format('d.m.Y')}}</p>
</li>
