@extends('admin_views.layout.admin_layout')

@section('title', 'Активности')


@section('content')
<div class="add">
    <a href="{{route('activities.create')}}">Додади</a>
</div>

<div class="news-list">
    @if ($activities->count() > 0)
            @foreach ($activities as $item)
                <div class="news-container">
                    <h3>{{ $item->name }}</h3>
                    <div class="buttons-wrapper">
                        <a href="{{route('activities.edit', ['id'=> $item->id])}}">Edit</a>
                    <form action="{{ route('activities.destroy', ['id' => $item->id] )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </div>
                </div>
            @endforeach
        
    @else
        <p>Нема пронајдени активности</p>
    @endif
</div>
@endsection