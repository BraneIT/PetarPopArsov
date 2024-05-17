@extends('admin_views.layout.admin_layout')

@section('title', 'Паралелки')

@section('content')
@if($paralelki)
<div class="add">
<p>Обришите паралелки за да додадете нови</p>
</div>
@else
<div class="add">
    <a href="/admin/paralelki/add">Додади</a>
</div>
@endif
{{-- <div class="add">
    <a href="/admin/paralelki/add">Додади</a>
</div> --}}
@if($paralelki)
    <div class="paralelki">
        <h1>Сите паралелки</h1>
        <label for="odelenska">Одделенски паралелки</label>
        <img src="{{ asset($paralelki->odelenska) }}" alt="Odelenska Image" style="width:100%; max-width:400px;">
        <label for="predmetna">Предметни паралелки</label>
        <img src="{{ asset($paralelki->predmetna) }}" alt="Predmetna Image" style="width:100%; max-width:400px;">

        <form action="/admin/paralelki/{{ $paralelki->id }}" method="POST" class='delete'>
            @csrf
            @method('DELETE')
            <button type="submit" class="button red-button">Избриши</button>
        </form>
    </div>
@else
    <p>Моментално нема објавени податоци</p>
@endif
@endsection