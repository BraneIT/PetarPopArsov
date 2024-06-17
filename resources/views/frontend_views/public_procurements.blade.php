@extends('frontend_views.layout.layout')

@section('title', 'Javni nabavki')

@section('content')

<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>јавни набавки</h1>
    </div>
</div> 

<div class="erasmus-wrapper">
    
    <div class="documents-container">
        <div class="year-container">
            <h1>Годишни планови за јавни набавки</h1>
        </div>
        @if($publicProcurements->where('type', 'oglasi')->isEmpty())
            <p>Моментално нема објавени податоци</p>
        @else
            @foreach ($publicProcurements as $item)
                @if($item->type == 'godisnjiPlanovi')
                    <a href="{{$item->link}}">{{$item->name}}</a>    
                @endif
            @endforeach
        @endif

        <div class="year-container">
            <h1>Објавени огласи</h1>
        </div>
        @if($publicProcurements->where('type', 'oglasi')->isEmpty())
            <p>Моментално нема објавени податоци</p>
        @else
            @foreach ($publicProcurements as $item)
                @if($item->type == 'oglasi')
                    <a href="{{$item->link}}">{{$item->name}}</a>    
                @endif  
            @endforeach
        @endif

    </div>
</div>
@endsection