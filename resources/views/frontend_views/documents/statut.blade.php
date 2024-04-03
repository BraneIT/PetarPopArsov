@extends('frontend_views.layout.layout')

@section('title', 'Статут')


@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>СТАТУТ</h1>
    </div>
</div>  

<div class="erasmus-wrapper">
    <div class="erasmus-container">
        <div class="year-container"><h1>Статут</h1></div>
        <object data="{{ asset('assets/regulations/statut.PDF') }}#toolbar=0" type="application/pdf" width="100%" height="600px">
        </object>
        <button class="open-pdf" onclick="openPDF('{{ asset('assets/regulations/statut.PDF') }}')">Прегледај ПДФ</button>
        <a href="{{ asset('assets/regulations/statut.PDF') }}" download="СТАТУТ ОУ ПЕТАР ПОП АРСОВ">
            <button>Преузми ПДФ</button>
        </a>
        <div class="year-container"><h1>Статутарна одлука за измени и дополнувања</h1></div>
        <object data="{{ asset('assets/regulations/izmjene_statuta.PDF') }}#toolbar=0" type="application/pdf" width="100%" height="600px">
        </object>
        <a href="{{ asset('assets/regulations/izmjene_statuta.PDF') }}" download="Статутарна одлука за измени и дополнувања">
            <button class="open-pdf" onclick="openPDF('{{ asset('assets/regulations/izmjene_statuta.PDF') }}')">Прегледај ПДФ</button>
            <button>Преузми ПДФ</button>
        </a>
    </div>
</div>

@endsection