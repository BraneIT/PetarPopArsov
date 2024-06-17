@extends('frontend_views.layout.layout')

@section('title', 'Активности')

@section('content')

@section('page_header')
<h1>{{$project->name}}</h1>
@endsection
<div class="erasmus-wrapper"> 
    <div class="documents-container">
        <div class="project-activities-wrapper">
            <div class="project-activity-image">
                <img src="{{asset($project->image_path)}}" alt="">
            </div>
            <div class="project-activity-content">
                {!! $project->content !!}
            </div>
            
        </div>
    </div>
</div>

@endsection
