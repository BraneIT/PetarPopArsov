@extends('frontend_views.layout.layout')

@section("title", "Првачиња")

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>ПРВАЧИЊА </h1>
    </div>
</div> 
<div class="erasmus-wrapper">
    
@if($prvacinja)


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
@endif

</div>
@endsection