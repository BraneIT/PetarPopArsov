@extends('frontend_views.layout.layout')

@section('title', 'Активности')

@section('content')

@section('page_header')
<h1>Активности</h1>
@endsection
<div class="erasmus-wrapper"> 
     <div class="documents-container">
            <div class="year-container">
                <h1>{{$year}}</h1>
            </div>
            @foreach ($activities as $item)
                <a href="{{route('aktivities.show', ['year'=> $item->year, 'slug' => $item->slug])}}">{{$item->name}}</a>
            @endforeach
        </div>
</div>

@endsection