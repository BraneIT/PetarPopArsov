@extends('admin_views.layout.admin_layout')
@section('title', 'Admin Panel Home')

@section('content')
<div class="add">
    <a href="/admin/gallery">Cancel</a>
</div>
    <form id="galleryForm" method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
    @csrf

    
        <div class="gallery-add">
        <label for="image">Прикачи слика</label>
        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" style="display: none;">
                <button type="button" id="imageButton" class="red-button button-gallery">Одбери слика</button>
                <p class="error-field" style="display: none;"></p>
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
    

    <button type="submit" id="uploadButton" class="button-gallery red-button">Објави слика</button>
</form>
@endsection