@extends('frontend_views.layout.layout')

@section('title', 'Правиници и прописи')


@section('content')
    <div class="pages-intro">
        <div class="pages-intro-container">
            <h1>ПРАВИЛНИЦИ И ПРОПИСИ</h1>
        </div>
    </div>
    <div class="erasmus-wrapper">
        <div class="documents-container">

            <div class="year-container"></div>

            @foreach ($regulations as $item)
                <a href="/pravilnici_i_propisi/{{ $item->slug }}">{{ $item->name}}</a>
            @endforeach


        </div>
    </div>
@endsection
