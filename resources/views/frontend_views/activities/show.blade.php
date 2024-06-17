@extends('frontend_views.layout.layout')

@section('title', 'Активности')

@section('page_header')
<h1>{{$activity->name}}</h1>
@endsection
@section('content')

<div class="erasmus-wrapper"> 
     <div class="documents-container">
        <div class="project-activities-wrapper">
            <div class="project-activity-image">
                <img src="{{asset($activity->image_path)}}" alt="">
            </div>
            <div class="project-activity-content">
            {!! $activity->content !!}
            </div>
        </div>

    </div>
</div>

@endsection
