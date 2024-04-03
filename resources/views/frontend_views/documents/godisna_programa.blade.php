@extends('frontend_views.layout.layout')

@section('title', 'Годишна програма и годишни и полугодишни извештаји')


@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>Годишна програма за работа на училиштето и годишни и полугодишни извештаи</h1>
    </div>
</div>  


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
{{-- 
<div class="erasmus-wrapper">
     @if(sizeof($documents)==0)
     <div class="documents-container">
        
            <p>Тренутно нема објављених докумената</p>
     </div>
    @else 
     {{ var_dump($uniqueYears) }}
    <?php $lastYear = null;?>
    <?php $containerCreated = false; ?>
    @foreach ($documents as $item)
    {{ var_dump($lastYear); }}
    {{ var_dump($containerCreated) }}
    
    
    @if($lastYear !== $item->year)
    <div class="documents-container">
        <?php $containerCreated = true ?>
        {{ var_dump($containerCreated) }}
    @endif    
    {{ $lastYear = $item->year; }}
     @if($item->end_year !== NULL)
     
        <div class="year-container"><h1>{{$item->year}}/{{$item->end_year}}</h1></div>
        <a href="godisna_programa_za_rad_na_učilište_i_godišnji_i_polugodišnji izvestaji/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
     
     @else
     
        <div class="year-container"><h1>{{$item->year}}</h1></div>
        <a href="godisna_programa_za_rad_na_učilište_i_godišnji_i_polugodišnji izvestaji/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
        
     @endif
        @if ($containerCreated) {{-- Check if container is created --}}
            {{-- </div> Close the last documents-container --}}
        {{-- @endif
    @endforeach
     
    @endif --}}
{{-- </div>     --}} 

{{-- <div class="erasmus-wrapper">
    @if(sizeof($documents)==0)
    <div class="documents-container">
        <p>Тренутно нема објављених докумената</p>
    </div>
    @else
    <?php $prevYear = null; ?>
    <div class="documents-container">
    @foreach ($documents as $item)
        @if ($item->year !== $prevYear)
            @if ($prevYear !== null)
            </div> <!-- Close previous year-container -->
            @endif
            <div class="year-container"><h1>{{ $item->year }}</h1></div> <!-- Open new year-container -->
            <div class="documents-container"> <!-- Open documents-container for new year -->
        @endif
        <a href="godisna_programa_za_rad_na_učilište_i_godišnji_i_polugodišnji izvestaji/{{ $item->category_id }}/{{ $item->year }}/{{ $item->slug }}">{{ $item->title }}</a>
        <?php $prevYear = $item->year; ?>
    @endforeach
    </div> <!-- Close last documents-container -->
    
    @endif
</div> --}}

@endsection