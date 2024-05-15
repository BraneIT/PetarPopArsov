@extends('frontend_views.layout.layout')

@section('title', 'Дома')


@section('content')
    {{--  --}}

    <section class="hidden" id="hero">
        
        
        <img src="{{ asset('assets/images/skola-min.webp') }}" alt="Slide 1">
        <div class="hero-info">
            <p>Добрeдојдовте на веб страната на</p>
            <h1>ООУ "Петар Поп Арсов"</h1>
            <p>Општина Карпош</p>
            <p>Повеке од 50 години традициjа!</p>
        </div>   
            
        
    </section>
    <section id="message-wrapper" class="hidden">
        <div class="message-container">
            <h1>"Образованието е најмоќното оружје што можете да го употребите за да го промените светот" </h1>
            <p>Нелсон Мандела</p>
        </div>
    </section>
   
    <section id="news-wrapper" class="hidden">
        <div class="news-label-container">
            <h1>НОВОСТИ</h1>
            <a href="/novosti" class="all-news">
            Види ги сите новости</a>
        </div>
        <div class="news-container hidden">
            @if (sizeof($news) == 0)
            <h1>Моментално нема објавени новости</h1>
            @else
            @foreach($news as $item)
                <div class="news">
                    <div class="news-image-container">
                        @if($item->image === "")
                            <img src="{{ asset('assets/images/logo-manji150.webp') }}" class="default-image">
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

                        <a href="/novosti/{{ $item->id }}">Прочитај повеке</a>
                    </div>
                </div>
            @endforeach
            @endif
            <a href="" class="all-news-phone">
            Види ги сите новости</a>
        </div>
    </section>
    <section id="gallery" class="hidden">
        <h1>ГАЛЕРИЈА</h1>
        <div class="gallery-index hidden">
            @foreach($gallery as $item)
                <figure class="card">
                    <img
                    src="{{$item->image}}"
                    
                    />
                </figure>
            @endforeach
                
        </div>
        <a href="/gallery" class="all-news" style="margin-top: 20px">
            Види ги сите слики</a>
        
    </section>
    <section id="video" class="hidden">
        <div class="video-label">
            <h1>Детска химна за „Карпош“ кој го сакаме</h1>
        </div>
        <object width="425" height="350" data="http://www.youtube.com/v/mYGZfv4GyS8" type="application/x-shockwave-flash" class="hidden"><param name="src" value="http://www.youtube.com/v/mYGZfv4GyS8" /></object>
    </section>
    
    
@endsection
