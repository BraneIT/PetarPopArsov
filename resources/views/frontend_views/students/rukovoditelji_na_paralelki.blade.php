@extends('frontend_views.layout.layout')

@section('title', 'Раководители на паралелки')

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>РАКОВОДИТЕЛИ НА ПАРАЛЕЛКИ</h1>
    </div>
</div>    
<div class="erasmus-wrapper">
    {{-- @if($paralelki !== null) --}}
    <div class="paralelki-container">
        <div class="year-container"><h1>ОДДЕЛЕНСКА НАСТАВА</h1></div>
        <img src="{{ asset('images/paralelki/Oddelenska nastava_1711729820.webp') }}" alt="">
    </div>
    <div class="paralelki-container ">
        <div class="year-container"><h1>ПРЕДМЕТНА НАСТАВА</h1></div>
       <img src="{{ asset('images/paralelki/Predmetni nastavnici_1711729821.webp') }}" alt="">
    </div>
    {{-- @else
        <p>Моментално нема објавени податоци</p>
    @endif --}}
</div>



@endsection