@extends('admin_views.layout.admin_layout')

@section('title', 'Додај паралелки')

@section('content')
<div class="add">
    <a href="/admin/paralelki">Откажи</a>
</div>
<form action="/admin/paralelki/add" method="POST" class="paralelki" enctype="multipart/form-data">
    @csrf
    @method("POST")
        <label for="image">Прикачи слика за одделенски паралелки</label>
        <input type="file" class="form-control-file" id="image" name="odelenska" accept="image/webp,image/*" style="display: none;">
        <button type="button" id="imageButton" class="red-button button-gallery">Одбери слика</button>
        @error('odelenska')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <label for="image">Прикачи слика за наставни паралелки</label>
        <input type="file" class="form-control-file" id="image2" name="predmetna" accept="image/webp,image/*" style="display: none;">
        <button type="button" id="imageButton2" class="red-button button-gallery">Одбери слика</button>
         @error('predmetna')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <button type="submit" id="submit-paralelki" class="button red-button">Објави</button>
</form>


@endsection