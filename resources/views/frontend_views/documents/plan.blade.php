@extends('frontend_views.layout.layout')

@section('title', 'План/скица на училиштето')


@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>ПЛАН/СКИЦА НА УЧИЛИШТЕТО</h1>
    </div>
</div>  
<div class="erasmus-wrapper">
    <div class="document-container">
        <div class="year-container"><h1>ПРВ КАТ</h1></div>
        <img src="{{ asset('assets/images/skica1.png') }}" alt="">
        <div class="year-container"><h1>ВТОР КАТ</h1></div>
        <img src="{{ asset('assets/images/skica2.png') }}" alt="">
        <div class="year-container"><h1>ДОПОЛНИТЕЛЕН ОБЈЕКТ</h1></div>
        <img src="{{ asset('assets/images/skica3.png') }}" alt="">
    </div>
</div>

@endsection