@extends('admin_views.layout.admin_layout')

@section('title', "Првачиња")

@section('content')
<div class="add">
    <a href="/admin/prvacinja">Назад</a>
    <a href="/admin/prvacinja/add">Додади</a>
</div>
<h1>Општи огласи</h1>
@foreach ($prvacinja as $item)
@if($item->type == 'all')
<div class="news-container">
    <h3>{{ $item->title }}</h3>
    <div class="buttons-wrapper">
        
    <form action="{{ route('destroy.prvacinja', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Избриши</button>
    </form>
    </div>
</div>
@endif
    
@endforeach
<h1>Документи кои треба родителот/старателот да ги пополни</h1>
@foreach ($prvacinja as $item)
@if($item->type == 'parents')
<div class="news-container">
    <h3>{{ $item->title }}</h3>
    <div class="buttons-wrapper">
        
    <form action="{{ route('destroy.prvacinja', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Избриши</button>
    </form>
    </div>
</div>
@endif
    
@endforeach
@endsection