@extends("frontend_views.layout.layout")

@section("title", "Слободни изборни предмети во учебната 2024/2025")
@section('page_header')
<h1>Слободни изборни предмети</h1>
@endsection
@section("content")

<div class="erasmus-wrapper">

    <div class="documents-container">
        <div class="year-container"><h1>Прашалник за учениците</h1></div>
        <a href="{{asset("assets/prvacinja/ПРАШАЛНИК ЗА УЧЕНИЦИТЕ.pdf")}}">Прашалник за учениците</a>

    </div>
</div>

@endsection