<li>
    <h3>
        <a href="articles/{{$article->slug}}">
            {{$article->title}}
        </a>
    </h3>
    <p>{{$article->body}}</p>
    <p>Дата публикации: {{$article->created_at->format('d.m.Y')}}</p>
</li>
