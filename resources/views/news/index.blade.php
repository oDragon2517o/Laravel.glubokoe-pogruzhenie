
@forelse($newsList as $news)
    <div class="news">
        <h3><a href="{{ route('news.show', ['id' => $news['id']]) }}">
                {{ $news['title'] }}
            </a>
        </h3>
        <img src="{{ $news['image'] }}">
        <br>
        {{--Комментарий--}}
        <p>Статус: <em>{{ $news['status'] }}</em></p>
        <p>Автор: <em>{{ $news['author'] }}</em></p>
        <p>{!! $news['description'] !!}</p>
        <p>Категория {{ $news['categories'] }}</p>
    </div>
    <hr>
@empty
<h2>Новостей нет</h2>

@endforelse
