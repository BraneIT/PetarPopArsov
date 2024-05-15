@extends("admin_views.layout.admin_layout")


@section("title", 'Projekti')

@section('content')
<div class="add">
    <a href="/admin/projects">Откажи</a>
</div>
<div class="form-container">
    <h2>Измени пројект</h2>
<form method="POST" action="{{route('update.project', ['id'=> $project->id])}}" enctype="multipart/form-data">
    @csrf
    <label>Име пројекта</label>
    <input type="text" name="name" required value="{{$project->name}}">
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
    <textarea name="content" required >{{$project->content}}</textarea>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" id="submit-button" class="green-button button">Објави</button>
</form>
</div>


@endsection