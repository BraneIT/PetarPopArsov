@extends('admin_views.layout.admin_layout')

@section('title', 'Активности')


@section('content')
<div class="add">
    <a href="{{route('activities.index')}}">Откажи</a>
</div>
<div class="form-container">
    <h2>Додади активност</h2>
<form method="POST" action="{{route('activities.store')}}" enctype="multipart/form-data">
    @csrf
    <label>Име</label>
    <input type="text" name="name" id="project-activity-name" required>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="image">Слика</label>
    <input type="file" class="form-control-file" id="project-activity-image" name="image_path" accept="image/*" style="display: none;">
    <button type="button" id="project-activity-image-button" class="red-button button">Одбери слика</button>
    @error('image_path')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label>Содржина</label>
    <textarea class="form-control" id="editor" name="content" ></textarea>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="year">year</label>
    <select name="year" id="project-activity-year">
        @for ($i = 2020; $i < 2030; $i++)
            
            <option value='{{$i . "-" . ($i+1)}}'>{{$i . "-" . ($i+1)}}</option>
        @endfor
    </select>
    <br>
    <button type="submit" id="submit-project-actvity-button" class="red-button button">Објави</button>
</form>
</div>

@endsection