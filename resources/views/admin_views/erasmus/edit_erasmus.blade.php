@extends('admin_views.layout.admin_layout')
@section('title', 'Erasmus+')

@section('content')
<div class="add">
    <a href="/admin/erasmus">Откажи</a>
</div>

<div class="form-container">
    <h2>Промени Erasmus+ пројект</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ route('erasmus.update', $erasmus->id) }}">
        @csrf
            <input type="hidden" id="editMode" value="edit">
        <label for="name">Име</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('title', $erasmus->name) }}" >
            
        <label for="file">Одбери Erasmus+ документ (PDF)</label>
        
        <input type="file" class="form-control-file" id="document" name="file" accept="application/pdf,.doc,.docx" style="display: none;" value=" {{ $erasmus->path }}">
        
                <button type="button" id="documentButton" class="green-button button
                ">Одбери document</button>
               

        <label for="start_date">Почетна година</label>
        <select name="start_date" id="start_date" required class="year">
            <option value="">Одбери година</option>
             @for ($year = 2016; $year <= 2030; $year++)
                 <option value="{{ $year }}" @if ($erasmus->start_date == $year) selected @endif>{{ $year }}</option>
            @endfor
        </select>

        <label for="end_date">Година на завршеток</label>
        <select name="end_date" id="end_date" required class="year">
            <option value="">Одбери година</option>
             @for ($year = 2016; $year <= 2030; $year++)
                 <option value="{{ $year }}" @if ($erasmus->end_date == $year) selected @endif>{{ $year }}</option>
            @endfor
        </select>

        <button type="submit" id="submit-button" class="button green-button">Објви</button>
    </form>
</div>
@endsection