@extends('admin_views.layout.admin_layout')

@section('title', "Првачиња")

@section('content')
<div class="add">
    <a href="/admin/prvacinja">Откажи</a>
</div>
<form action="" class="flex-prvacinja" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Слика</label>
    <input type="file" class="form-control-file" id="image" name="image_path" accept="image/*" style="display: none;">
                <button type="button" id="imageButton" class="red-button button">Одбери слика</button>
    <label>Содржина</label>
    <textarea class="form-control" id="editor" name="content" required></textarea>

    <button type="submit" id="validationButton" class="red-button button">Објави</button>
</form>
@endsection