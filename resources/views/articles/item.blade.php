<li>
    <h3>
        <a href="{{route('articles.show', $article)}}">
            {{$article->title}}
        </a>

    </h3>
    <a href="">Редактировать</a>
    <p>{{$article->body}}</p>
    <p>Дата публикации: {{$article->created_at->format('d.m.Y')}}</p>
</li>
