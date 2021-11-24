<li>
    <h3>
        <a href="{{route('articles.show', $article)}}">
            {{$article->title}}
        </a>
    </h3>
    <a href="{{route('articles.edit', $article)}}">Редактировать</a>
    <form method="POST" action="{{route('articles.destroy', $article)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-danger">Удалить</button>
    </form>
    <p>{{$article->body}}</p>
    <p>Дата публикации: {{$article->created_at->format('d.m.Y')}}</p>
    @include('articles.tags', ['tags'=>$article->tags])
</li>
