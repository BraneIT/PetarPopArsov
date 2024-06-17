@extends('frontend_views.layout.layout')

@section('title', 'Новости')

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>Новости</h1>
    </div>
</div> 

 <div class="erasmus-wrapper">
    
        <div class="news-container">
            @foreach($news as $item)
                <div class="news">
                    <div class="news-image-container">
                        @if($item->image === "")
                            <img src="{{ asset('assets/images/logo.png') }}" class="default-image">
                        @else
                            <img src="{{$item->image}}" alt="" class="news-images">
                        @endif
                        
                    </div>
                    <div class="news-details">
                        <div class="date"> 
                            <p>{{ $item->created_at->format('d/n/Y') }}</p>
                        </div>
                        
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->short_content }}</p>
                    </div>
                    <div class="news-button">

                        <a href="/novosti/{{ $item->slug }}">Прочитај повеке</a>
                    </div>
                </div>
            @endforeach
        </div>

 </div>
@endsection