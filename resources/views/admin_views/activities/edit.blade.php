@extends('admin_views.layout.admin_layout')

@section('title', 'Активности')


@section('content')
<div class="add">
    <a href="{{route('activities.index')}}">Откажи</a>
</div>
<div class="form-container">
    <h2>Додади активност</h2>
<form method="POST" action="{{route('activities.update',['id'=>$activity->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>Име</label>
    <input type="text" name="name" required value="{{$activity->name}}">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="image">Слика</label>
    <input type="file" class="form-control-file" id="image" name="image_path" accept="image/*" >
    {{-- <button type="button" id="imageButton" class="blue-button button">Одбери слика</button> --}}
    @error('image_path')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label>Содржина</label>
    <textarea name="content" id="editor" cols="30" rows="10" required>{{$activity->content}}</textarea>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select name="year" id="project-activity-year">
        @for ($i = 2020; $i < 2030; $i++)
            <option value="{{ $i . "-" . ($i+1)}}" @if ($activity->year == $i) selected @endif>{{$i . "-" . ($i+1) }}</option>
            <option value='{{$i . "-" . ($i+1)}}'>{{$i . "-" . ($i+1)}}</option>
        @endfor
    </select>
    <button type="submit" id="submit-button" class="red-button button">Објави</button>
</form>
</div>

@endsection