@extends('admin_views.layout.admin_layout')
@section('title', 'Documents')

@section('content')

<div class="add">
    <a href="/admin/documents">Cancel</a>
</div>
<div class="form-container">
    <h2>Edit document</h2>
    <form method="POST" enctype="multipart/form-data" action="{{route('update.documents', ['category_id' => $document->category_id, 'id' => $document->id])}}">
        @csrf
        <input type="hidden" id="editMode" value="edit">
        <label for="name">Name</label>
        
        <input type="text" class="form-control" id="documents-title" name="title" value="{{ old('title', $document->title) }}" required>
            
        <label for="file">Select document (PDF or Word)</label>
        <input type="file" class="form-control-file" id="document" name="file" accept="application/pdf,.doc,.docx" style="display: none;" >
        
        <button type="button" id="documentButton" class="green-button button">Choose document</button>
        <label for="">Име тренутног фајла</label>
        <p>{{$fileName}}</p>
        <label for="category">Category</label>
        <select name="category_id" class="category" required>
            <option value="">Select Category</option>
              @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $document->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <select name="finance_category_id" class="finance-category" style="display: none">
            
            <option value="2">Завршни сметки </option>
            <option value="1">Годишни буџети</option>
            <option value="3">Годишни финансиски планови по квартали и програми за реализација на буџетот</option>
        </select>
        <label for="end_year">Start end</label>
        <select name="year" id="year" class="year" required>>
            <option value="">Select year</option>
            @for ($year = 2016; $year <= 2027; $year++)
                <option value="{{ $year }}" @if ($document->year == $year) selected @endif>{{ $year }}</option>
            @endfor
        </select>

        <label for="end_year">Year of end</label>
           
        <select name="end_year" id="end_year" class="year">
            <option value="">Select Year</option>

            @for ($year = $document->year +1; $year <= 2027; $year++)
                <option value="{{ $year }}" @if ($document->end_year == $year) selected @endif>{{ $year }}</option>
            @endfor
        </select>

        <button type="submit" id="submit-documents" class="button green-button">Submit</button>
    </form>
</div>

@endsection