@extends('admin_views.layout.admin_layout')
@section('title', 'Admin Panel Home')

@section('content')
   
<div class="add">
    <a href="/admin/news">Откажи</a>
</div>
     <div class="form-container">
        <h2>Додади новости</h2>
        <form method="POST" class="news-form" enctype="multipart/form-data">
            @csrf
            
                <label for="title">Наслов</label>
                <input type="text" class="form-control" id="title" name="title" required>
         
                <label for="short_content" style="text-align: center">Кратка содржина <br>(До 20 зборови)</label>
                <textarea class="form-control" id="short_content" name="short_content" rows="3" required></textarea>
  
                <label for="content">Содржина</label>
                <textarea class="form-control" id="editor" name="content" ></textarea>

                <label for="image">Слика</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" style="display: none;">
                <button type="button" id="imageButton" class="blue-button button">Одбери слика</button>
                
            
            <button type="submit" id="submit-button" class="red-button button">Објави</button>
        </form>
    </div>


@endsection