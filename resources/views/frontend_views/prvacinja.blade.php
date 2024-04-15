@extends('frontend_views.layout.layout')

@section("title", "Првачиња")

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>ПРВАЧИЊА </h1>
    </div>
</div> 
<div class="erasmus-wrapper">
    
    <div class="documents-container">
        <div class="year-container">
            <h1>2024/2025</h1>
        </div>
        @foreach($documents as $document)
            <a href="{{$document['path']}}">{{$document['name']}}</a>
           
        @endforeach
    </div>
{{-- @if($prvacinja)


    <div class="prvacinja-image-container">
        <img src="{{ asset($prvacinja->image_path) }}" alt="">
    </div>
    <div class="prvacinja-content">
        {!! $prvacinja->content !!}
    </div>

@else
<div class="documents-container">
<a>Моментално нема објавени информации</a>
</div>
@endif --}}

</div>
@endsection