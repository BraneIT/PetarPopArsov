@extends('frontend_views.layout.layout')

@section('title', 'Дома')


@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>ФИНАНСИСКИ ДОКУМЕНТИ</h1>
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
        <div class="year-container"><h1>Годишни буџети</h1></div>
        @foreach ($documents as $item)
            @if($item->finance_category_id ==1)
                <a href="/finansiski_dokumenti/{{$item->category_id}}/{{$item->year}}/{{$item->slug}}">{{$item->title}}</a>
            @endif
        @endforeach
        
        @foreach ($documents as $item)
            @if($item->finance_category_id ==2)
                @if($item->end_year !== NULL)
                @if ($lastYear !== $item->year || $endYear !== $item->end_year)
                    <div class="year-container"><h1>Завршни сметки {{$item->year}}/{{$item->end_year}} године</h1></div>
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
                            <div class="year-container"><h1>Завршни сметки {{$item->year}} година</h1></div>
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
            @endif
        @endforeach

        <div class="year-container"><h1> Годишни финансиски планови по квартали и програми за реализација на буџетот</h1></div>
        @if ($documents->where('finance_category_id', 3)->isEmpty())
            <a>Моментално нема објавени документи</a
                >
        @else
            @foreach ($documents as $item)
                @if ($item->finance_category_id == 3)
                    <a href="/finansiski_dokumenti/{{$item->category_id}}/{{$item->year}}/{{$item->slug}}">{{$item->title}}</a>
                @endif
            @endforeach
        @endif
       

    </div>
    @endif
</div>

@endsection