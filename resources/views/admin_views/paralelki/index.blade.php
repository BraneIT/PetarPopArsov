@extends('admin_views.layout.admin_layout')

@section('title', 'Паралелки')

@section('content')
<div class="add">
    <a href="/admin/paralelki/add">Додади</a>
</div>
@if($paralelki !== null)
    <img src="{{ asset($paralelki->odelenska) }}" alt="Odelenska Image">

    <img src="{{ asset($paralelki->predmetna) }}" alt="Predmetna Image">

 <form action="/admin/paralelki/{{ $paralelki->id }}" method="POST" class='delete'>
        @csrf
        @method('DELETE')
        <button type="submit" class="button red-button">Избриши</button>
    </form>
@else

<p>Моментално нема објавени податоци</p>
@endif
@endsection