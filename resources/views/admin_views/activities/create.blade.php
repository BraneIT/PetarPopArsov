@extends('admin_views.layout.admin_layout')

@section('title', 'Активности')


@section('content')
<div class="add">
    <a href="{{route('activities.index')}}">Откажи</a>
</div>
<form method="POST" action="{{route('activities.store')}}" enctype="multipart/form-data">
    @csrf
    <label>Име</label>
    <input type="text" name="name" required>
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
    <textarea name="content" id="" cols="30" rows="10" required></textarea>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" id="submit-button" class="red-button button">Објави</button>
</form>
</div>

@endsection