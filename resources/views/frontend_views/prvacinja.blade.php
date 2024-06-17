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
            <h1>{{$year}}</h1>
        </div>
        @if ($prvacinja->where('type', 'all')->isEmpty())
            <a>Моментално нема објавени документи</a>
        @else
            @foreach ($prvacinja as $item)
                @if($item->type == 'all')
                    <a href="{{$item->document_path}}">{{$item->title}}</a>
                @endif
            @endforeach
        @endif
        <div class="year-container">
            <h1>Документи кои треба родителот/старателот да ги пополни</h1>
        </div>
        @if ($prvacinja->where('type', 'parents')->isEmpty())
            <a>Моментално нема објавени документи</a>
        @else
            @foreach ($prvacinja as $item)
                @if($item->type == 'parents')
                    <a href="{{$item->document_path}}">{{$item->title}}</a>
                @endif
            @endforeach
        @endif
        {{-- @foreach($documents as $document)
            <a href="{{$document['path']}}">{{$document['name']}}</a>
           
        @endforeach
        <div class="year-container">
            <h1>Документи кои треба родителот/старателот да ги пополни</h1>
        </div>
        <a href="{{asset('/assets/prvacinja/ИЗЈАВА ЗА СОГЛАСНОСТ ЗА ОБРАБОТКА ЗА ЛИЧНИ ПОДАТОЦИ.pdf')}}">Изјава за согласност за обработка за лични податоци</a>
        <a href="{{asset('/assets/prvacinja/ПОДАТОЦИ ЗА УЧЕНИКОТ И РОДИТЕЛОТ ЗБИРКА НА ПОДАТОЦИ СПОРЕД ЗАКОН.pdf')}}">Податоци за ученикот и родителот/старателот збирка на податоци според закон</a>
        <a href="{{asset('/assets/prvacinja/ПРАШАЛНИК ЗА РОДИТЕЛИ.pdf')}}">Прашалник за родители/старатели</a> --}}

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