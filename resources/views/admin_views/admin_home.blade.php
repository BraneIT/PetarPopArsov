@extends('admin_views.layout.admin_layout')
@section('title', 'Home')

@section('content')
    <h1>Добродојдовте на админ панел</h1>
    <p>Memory Usage: {{ convert(memory_get_usage()) }}</p>
@endsection