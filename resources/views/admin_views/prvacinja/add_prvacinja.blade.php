@extends('admin_views.layout.admin_layout')

@section('title', "Првачиња")

@section('content')
<div class="add">
    <a href="/admin/prvacinja">Откажи</a>
</div>
<form action="" class="flex-prvacinja" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Одбери тип на документ</label>
    <select name="type" id="prvacijna-type">
        <option value="1">Слика</option>
        <option value="2">Документ</option>
    </select>
    <div id="prvacinja-image" >
        
        <label>Одбери слика</label>
        <input type="file" class="form-control-file" id="image" name="path" accept="image/*" style="display: none;">
                    <button type="button" id="imageButton" class="red-button button">Одбери слика</button>
    </div>
    <div id="prvacinja-documents" >
        <label>Одбери документ</label>
        <input type="file" class="form-control-file" id="document" name="path\
        " accept="application/pdf,.doc,.docx" style="display: none;" required>
        <button type="button" id="documentButton" class="red-button button">Одбери документ</button>
    </div>
    <label>Одбери година</label>
        <select name="" id="">
            @for ($i = 2024; $i < 2030; $i++)
                <option value="{{ $i }}/{{ $i + 1 }}">{{ $i }}/{{ $i + 1 }}</option>
            @endfor
        </select>

    {{-- <textarea class="form-control" id="editor" name="content" required></textarea> --}}

    <button type="submit" id="validationButton" class="red-button button">Објави</button>
</form>
@endsection