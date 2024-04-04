@extends('admin_views.layout.admin_layout')
@section('title', 'Documents')

@section('content')

<div class="add">
    <a href="/admin/documents">Откажи</a>
</div>

<div class="form-container">
    <h2>Додади документ</h2>
    <form method="POST" enctype="multipart/form-data" action="{{route('store.documents')}}">
        @csrf
            
        <label for="name">Име документа</label>
        <input type="text" class="form-control" id="documents-title" name="title" required>
        
        <label>Одбери документ</label>
        <input type="file" class="form-control-file" id="document" name="file" accept="application/pdf,.doc,.docx" style="display: none;" required>
        
        <button type="button" id="documentButton" class="red-button button">Одбери документ</button>
        
                
                

        <label for="category">Вид на документ</label>
        <select name="category_id" required class="category">
            <option value="">Одбери вид на документ</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <select name="finance_category_id" class="finance-category" style="display: none">
            
            <option value="2">Завршни сметки </option>
            <option value="1">Годишни буџети</option>
            <option value="3">Годишни финансиски планови по квартали и програми за реализација на буџетот</option>
        </select>
        <label>Година</label>
        <select name="year" id="year" required class="year">
            <option value="">Одбери година</option>
             @for ($year = 2016; $year <= 2030; $year++)
                <option value="{{ $year }}">{{ $year }}</option>

            @endfor
        </select>
     
        
            <label for="end_year" style="text-align: center">Завршна година <br>(за документи који важат повеке години)</label>
           
            <select name="end_year" id="end_year" class="year">
                <option value="">Одбери година</option>
                
            </select>
      

        <button type="submit" id="submit-documents" class="button red-button">Објави</button>
    </form>
</div>
@endsection