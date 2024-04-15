@extends('admin_views.layout.admin_layout')

@section('title', "Првачиња")

@section('content')
<div class="add">
    <a href="/admin/prvacinja/add">Додади</a>
</div>
@if($prvacinja)

<div class="prvacinja-wrapper">
    {{-- @if($prvacinja->)
    <div class="prvacinja-image-container">
        <img src="{{ asset($prvacinja->path) }}" alt="">
    </div>
    <div class="prvacinja-content">
        {!! $prvacinja->content !!}
    </div>
    <form action="/admin/prvacinja/delete/{{ $prvacinja->id }}" method="POST" class='delete'>
        @csrf
        @method('DELETE')
        <button type="submit" class="button red-button">Избриши</button>
    </form> --}}
</div>
@else
<p>Нема пронајдени податоци</p>
@endif
@endsection