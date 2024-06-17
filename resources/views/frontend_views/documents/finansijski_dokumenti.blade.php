@extends('frontend_views.layout.layout')

@section('title', 'Дома')

@section('page_header')
<h1>Финансиски документи</h1>
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
        <div class="year-container"><h1>Годишни буџети</h1></div>
        @if ($documents->where('finance_category_id', 1)->isEmpty())
            <a>Моментално нема објавени документи</a>
        @else
            @foreach ($documents as $item)
                @if($item->finance_category_id ==1)
                    <a href="/finansiski_dokumenti/{{$item->category_id}}/{{$item->year}}/{{$item->slug}}">{{$item->title}}</a>
                @endif
            @endforeach
        @endif
        @if ($documents->where('finance_category_id', 2)->isEmpty())
        <a>Моментално нема објавени документи</a
            >
        @else
        @foreach ($documents as $item)
            @if($item->finance_category_id ==2)
                @if($item->end_year !== NULL)
                @if ($lastYear !== $item->year || $endYear !== $item->end_year)
                    <div class="year-container"><h1>Завршни сметки {{$item->year}}/{{$item->end_year}} године</h1></div>
                    <a href="finansiski_dokumenti/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
                    <?php $lastYearForEndYears = $item->year;
                        ?>
                @else

                    <a href="finansiski_dokumenti/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
                    <?php $lastYearForEndYears = $item->year;
                        ?>
                @endif
            
            @else
                @if ($lastYear != $item->year && $item->end_year == NULL)
                            <div class="year-container"><h1>Завршни сметки {{$item->year}} година</h1></div>
                            <a href="finansiski_dokumenti/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
                            <?php $lastYear = $item->year; ?>
                        @else
                            
                            <a href="finansiski_dokumenti/{{ $item->category_id }}/{{$item->year}} /{{$item->slug}}">{{$item->title}} </a>
                            <?php $lastYear = $item->year; ?>
                        @endif
                @endif
                <?php
                    
                    $endYear = $item->end_year;
                ?>
            @endif
            @endforeach
            @endif

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