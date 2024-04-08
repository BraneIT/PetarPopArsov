@extends('frontend_views.layout.layout')

@section('title', 'Раководители на паралелки')

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>РАКОВОДИТЕЛИ НА ПАРАЛЕЛКИ</h1>
    </div>
</div>    
<div class="erasmus-wrapper">
    @if($paralelki)
    <div class="paralelki-container">
        <div class="year-container"><h1>ОДДЕЛЕНСКА НАСТАВА</h1></div>
        <img src="{{ asset($paralelki->odelenska) }}" alt="">
    </div>
    <div class="paralelki-container ">
        <div class="year-container"><h1>ПРЕДМЕТНА НАСТАВА</h1></div>
       <img src="{{ asset($paralelki->predmetna) }}" alt="">
    </div>
    @else
        <p>Моментално нема објавени податоци</p>
    @endif
</div>



@endsection