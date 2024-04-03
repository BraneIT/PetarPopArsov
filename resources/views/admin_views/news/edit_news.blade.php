@extends('admin_views.layout.admin_layout')
@section('title', 'Admin Panel Home')

@section('content')
<div class="add">
    <a href="/admin/news">Откажи</a>
</div>
     <div class="form-container">
        <h2>Промени новост</h2>
        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
            @csrf
            
                <label for="title">Наслов</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}">
            
            
                <label for="short_content">Кратка содржина</label>
                <textarea class="form-control" id="short_content" name="short_content" rows="3">{{ old('short_content', $news->short_content) }}</textarea>
            
            
                {{-- <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="6" ></textarea> --}}
                <label for="content">Содржина</label>
                <textarea class="form-control" id="editor" name="content" >{{ old('content', $news->content) }}</textarea>
           
            
                
                <label for="image">Слика</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" style="display: none;"  value="{{ old('image', $news->image) }}">
                <button type="button" id="imageButton" class="blue-button button">Одбери слика</button>
               
            
            <button type="submit" class="green-button button">Објави</button>
        </form>
    </div>
@endsection