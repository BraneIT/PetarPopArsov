@extends('admin_views.layout.admin_layout')

@section('title', 'Dev')

@section('content')

<p>Memory Usage: {{ convert(memory_get_usage()) }}</p>
@endsection