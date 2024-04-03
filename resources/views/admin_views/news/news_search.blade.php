@extends('admin_views.layout.admin_layout')
@section('title', 'Search')

@section('content')
<div class="add">
    <a href="/admin/news/add">Додади</a>
</div>

<form action="{{ route('search.news') }}" method="GET" class="search">
    <input type="text" name="search">
    <button type="submit">Пребарај</button>
</form>

<h2 class="label">Пребаране новости</h2>
<div class="news-list"> 
    @if ($news->count() > 0)
            @foreach ($news as $item)
                <div class="news-container">
                    <h3>{{ $item->title }}</h3>
                    <div class="buttons-wrapper">
                        <a href="{{ route('admin.news.edit', ['id' => $item->id]) }}">Промени</a>
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Избриши</button>
                        </form>
                    </div>
                </div>
            @endforeach
        
    @else
        <p>Нема пронајдени новости</p>
    @endif
</div>
@endsection