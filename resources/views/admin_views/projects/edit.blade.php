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
    <input type="hidden" id='edit-project-activity'>
    <label>Име пројекта</label>
    <input type="text" name="name" id="project-activity-name" required value="{{$project->name}}">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="image">Слика</label>
    <input type="file" class="form-control-file" id="project-activity-image" name="image_path" accept="image/*" style="display: none;">
    <button type="button" id="project-activity-image-button" class="green-button button">Одбери слика</button>
    <p>{{$fileName}}</p>
    @error('image_path')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label>Содржина</label>
    <textarea class="form-control" id="editor" name="content" >{{$project->content}}</textarea>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>

    <button type="submit" id="submit-project-actvity-button" class="green-button button">Објави</button>
</form>
</div>


@endsection