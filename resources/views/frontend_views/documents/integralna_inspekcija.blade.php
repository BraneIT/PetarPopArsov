@extends('frontend_views.layout.layout')

@section('title', 'Интегрална инспекција')

@section('page_header')
<h1>Интегрална инспекција</h1>
@endsection
@section('content')
 
<div class="erasmus-wrapper">
    @if(sizeof($documents)==0)
        <div class="documents-container">     
            <p>Моментално нема објавени документи</p>
        </div>
     @else 
   <?php $lastYear = null;
   $endYear = null;
   $lastYearForEndYears = null;?>
    <div class="documents-container">
        @foreach ($documents as $item)
       
        @if($item->end_year !== NULL)
            @if ($lastYear !== $item->year || $endYear !== $item->end_year)
                <div class="year-container"><h1>{{$item->year}}/{{$item->end_year}}</h1></div>
                <a href="godisna_programa_za_rad_na_učilište_i_godišnji_i_polugodišnji izvestaji/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
                <?php $lastYearForEndYears = $item->year;
                     ?>
            @else

                <a href="godisna_programa_za_rad_na_učilište_i_godišnji_i_polugodišnji izvestaji/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
                <?php $lastYearForEndYears = $item->year;
                     ?>
            @endif
        @else
        @if ($lastYear != $item->year && $item->end_year == NULL)
                    <div class="year-container"><h1>{{$item->year}}</h1></div>
                    <a href="godisna_programa_za_rad_na_učilište_i_godišnji_i_polugodišnji izvestaji/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
                    <?php $lastYear = $item->year; ?>
                @else
                    
                    <a href="godisna_programa_za_rad_na_učilište_i_godišnji_i_polugodišnji izvestaji/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
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