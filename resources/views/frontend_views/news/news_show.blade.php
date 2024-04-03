@extends('frontend_views.layout.layout')

@section('title',  $news->title )

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>{{ $news->title }}</h1>
    </div>
</div> 
<div class="erasmus-wrapper">
    <div class="single-news-wrapper">
        <div class="show-news-image">
            <img src="{{asset($news->image)  }}" alt="">
        </div>
        <div class="news-content-container">

            {!! $news->content !!}
        </div>
    </div>
</div>

@endsection