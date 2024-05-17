@extends('admin_views.layout.admin_layout')

@section('title', 'Javni nabavki')

@section('content')
<div class="add">
    <a href="{{route('public.procurements.index')}}">Откажи</a>
</div>

<form action="{{route('public.procurements.store')}}" method="post" class="prvacinja-form">
    @csrf
    <h1>Додади јавну набавку</h1>
    <label for="name">Име</label>
    <input type="text" name='name' id="public-procurement-name">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="">Линк</label>
    <input type="text" name='link' id="public-procurement-link">
    @error('link')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="type">Одбери тип</label>
    <select name="type">
        <option value="godisnjiPlanovi">Годишни планиови</option>
        <option value="oglasi">Огласи</option>
    </select>
    @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="year">Година</label>
    <select name="year">|
        @for ($year = 2020; $year <= 2030; $year++)
            <option value="{{ $year }}">{{ $year }}</option>
        @endfor
    </select>
    @error('year')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <button type="submit" id="submit-public-procurement" class="button red-button">Објави</button>
</form>

@endsection

