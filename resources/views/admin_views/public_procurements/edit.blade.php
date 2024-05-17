@extends('admin_views.layout.admin_layout')

@section('title', 'Javni nabavki')

@section('content')
<div class="add">
    <a href="{{route('public.procurements.index')}}">Откажи</a>
</div>

<form action="{{ route('public.procurements.update', ['id' => $publicProcurement->id]) }}" method="post" class="prvacinja-form">
    @csrf
    @method('PUT')
    <label for="">Име</label>
    <input type="text" name='name' id="public-procurement-name" value="{{$publicProcurement->name}}">
    <label for="">Линк</label>
    <input type="text" name='link' id="public-procurement-link" value="{{$publicProcurement->link}}">
    <label for="">Одбери тип</label>
    <select name="type">|
        <option value="godisnjiPlanovi" {{ $publicProcurement->type == 'godisnjiPlanovi' ? 'selected' : '' }}>Годишни планиови</option>
        <option value="oglasi" {{ $publicProcurement->type == 'oglasi' ? 'selected' : '' }}>Огласи</option>
    </select>
    <label for="year">Година</label>
    <select name="year" id="" >
        @for ($year = 2020; $year <= 2030; $year++)
        <option value="{{ $year }}" @if ($publicProcurement->year == $year) selected @endif>{{ $year }}</option>
    @endfor
    </select>
    <br>
    <button type="submit" id="submit-public-procurement" class="button green-button">Објави</button>
</form>

@endsection

