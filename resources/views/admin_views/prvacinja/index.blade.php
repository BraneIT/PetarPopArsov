@extends('admin_views.layout.admin_layout')

@section('title', "Првачиња")

@section('content')
<div class="add">
    <a href="/admin/prvacinja/add">Додади</a>
</div>


<div class="prvacinja-wrapper">
@if(count($uniqueYears) > 0)
    <div class="document-categories-container">
        @foreach($uniqueYears as $year)
        <div class="document-categories">
            <a href="{{route('prvacinja.by.year', ['year'=> $year])}}">{{ $year }}</a>
        </div>
            
        @endforeach
    </div>
@else
    <h1>Тренутно нема објавени документи</h1>
@endif
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

@endsection