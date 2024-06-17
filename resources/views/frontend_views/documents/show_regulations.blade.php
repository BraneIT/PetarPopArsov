@extends('frontend_views.layout.layout')

@section('title', $regulation->name)

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>{{$regulation->name}}</h1>
    </div>
</div>  
<div class="erasmus-wrapper">
    <div class="erasmus-container">
        <object data="{{ asset($regulation->file) }}#toolbar=0" type="application/pdf" width="100%" height="600px">
        </object>
        {{-- <iframe src="{{ asset($document->file) }}#toolbar=0" title='SOME_TITLE' ></iframe> --}}
        {{-- <embed src="{{asset($project->path)}}#toolbar=0" type=""> --}}
        <a href="{{ asset($regulation->file) }}" download="{{$regulation->name}}">
            <button>Превземи ПДФ</button>
        </a>
    </div>
</div>


@endsection