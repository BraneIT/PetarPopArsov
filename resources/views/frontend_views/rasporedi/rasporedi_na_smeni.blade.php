@extends('frontend_views.layout.layout')

@section('title', "Распоред на смени")

@section('page_header')

<h1>Распоред на смени</h1>
@endsection
@section('content')

<div class="erasmus-wrapper">
    <div class="documents-container">
        <div class="year-container"><h1>РАСПОРЕД НА СМЕНИ ЗА УЧЕБНАТА 2023/24</h1></div>
        <div class="smeni-container">
            <h1>Предметна настава </h1>
            <p>I смена 7:30 – 13:40</p>
            <p>II смена 13:00 – 19: 50</p>
            <h1>Одделенска настава</h1>
            <p>I смена 7:30 – 12:55</p>
            <p>II смена 12:30 – 17: 55</p>
        </div>
    </div>
</div>

@endsection