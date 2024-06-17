@extends('admin_views.layout.admin_layout')

@section('title', 'Првачиња')

@section('content')
<div class="add">
    <a href="/admin/prvacinja">Откажи</a>
</div>

<form action="{{route('store.prvacinja')}}" method="POST" enctype="multipart/form-data" class="prvacinja-form" id="prvacinja-form">
    @csrf
    <h1>Додади документ за првачиња</h1>
    <label for="title">Naziv dokumenta</label>
    <input type="text" name="title" id="prvacinja-title">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <label for="type">Тип документа</label>
    <select name="type" id="type" required>
        <option value="all">Опште</option>
        <option value="parents">За родители</option>
    </select>
    @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <label for="file">Одбери документ</label>
    <input type="file" id="document" name="document_path" accept="application/pdf" style="display: none">
    <button type="button" id="documentButton" class="red-button button">Одбери документ</button>
    @error('document_path')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <label for="year">Одбери година</label>
    <select name="year" required>
        <option value="2023-2024">2023/2024</option>
        <option value="2024-2025">2024/2025</option>
        <option value="2025-2026">2025/2026</option>
        <option value="2026-2027">2026/2027</option>
        <option value="2027-2028">2027/2028</option>
        <option value="2028-2029">2028/2029</option>
        <option value="2029-2030">2029/2030</option>
        <option value="2030-2031">2030/2031</option>

        
    </select>
    @error('year')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <br>
    <button type="submit" class="button red-button" id="submit-prvacinja">Објави</button>

</form>

@endsection