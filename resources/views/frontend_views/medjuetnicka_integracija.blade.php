@extends('frontend_views.layout.layout')

@section('title', 'Меѓуетничка интеграција во образованието')

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>Меѓуетничка интеграција во образованието</h1>
    </div>
</div>  
<div class="erasmus-wrapper">
    @if(sizeof($data)==0)
        <div class="documents-container">     
            <p>Моментално нема објавени документи</p>
        </div>
     @else 
   <?php $lastYear = null;
   $endYear = null;
   $lastYearForEndYears = null;?>
    <div class="documents-container">
        @foreach ($data as $item)
        
        @if($item->end_year !== NULL)
            @if ($lastYear !== $item->year || $endYear !== $item->end_year)
                <div class="year-container"><h1>{{$item->year}}/{{$item->end_year}}</h1></div>
                <a href="/megjuetnicka_integracija_vo_obrazovanieto/{{ $item->category_id }}/{{$item->year}}/{{$item->slug}}">{{$item->title}} </a>
                <?php $lastYearForEndYears = $item->year;
                     ?>
            @else

                <a href="/megjuetnicka_integracija_vo_obrazovanieto/{{ $item->category_id }}/{{$item->year}}/{{$item->slug}}">{{$item->title}} </a>
                <?php $lastYearForEndYears = $item->year;
                    ?>
            @endif
        @else
        @if ($lastYear != $item->year && $item->end_year == NULL)
                    <div class="year-container"><h1>{{$item->year}}</h1></div>
                    <a href="/megjuetnicka_integracija_vo_obrazovanieto/{{ $item->category_id }}/{{$item->year}}/{{$item->slug}}">{{$item->title}} </a>
                    <?php $lastYear = $item->year; ?>
                @else
                    
                    <a href="/megjuetnicka_integracija_vo_obrazovanieto/{{ $item->category_id }}/{{$item->year}}/{{$item->slug}}">{{$item->title}} </a>
                    <?php $lastYear = $item->year; ?>
                @endif
        @endif
        <?php
            
            $endYear = $item->end_year;
         ?>
        @endforeach

    </div>
    @endif
</div>

@endsection