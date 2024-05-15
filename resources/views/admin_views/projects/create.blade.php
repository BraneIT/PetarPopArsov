@extends("admin_views.layout.admin_layout")


@section("title", 'Projekti')

@section('content')
<div class="add">
    <a href="/admin/projects">Откажи</a>
</div>
<div class="form-container">
    <h2>Додади пројект</h2>
<form method="POST" action="{{route('project.store')}}" enctype="multipart/form-data">
    @csrf
    <label>Име</label>
    <input type="text" name="name" required>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="image">Слика</label>
    <input type="file" class="form-control-file" id="image" name="image_path" accept="image/*" style="display: none;">
    <button type="button" id="imageButton" class="blue-button button">Одбери слика</button>
    @error('image_path')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <label>Содржина</label>
    <textarea class="form-control" id="editor" name="content" ></textarea>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" id="submit-button" class="red-button button">Објави</button>
</form>
</div>


@endsection