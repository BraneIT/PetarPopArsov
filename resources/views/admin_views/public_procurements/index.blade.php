@extends('admin_views.layout.admin_layout')

@section('title', 'Javni nabavki')

@section('content')
<div class="add">
    <a href="{{route('public.procurements.create')}}">Додади</a>
</div>

<div class="public-procurements-wrapper">
<h1>Годишни планови</h1>
@foreach ($publicProcurements as $item)
@if($item->type =='godisnjiPlanovi')
<div class="news-container">
    <h3>{{ $item->name }} - {{$item->year}}</h3>
    
    <div class="buttons-wrapper">
        <a href="{{route('public.procurements.edit',['id'=>$item->id])}}">Измени</a>
    <form action="{{route('public.procurements.destroy',['id'=>$item->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Избриши</button>
    </form>
    </div>
</div>
@endif
@endforeach
<h1>Општи огласи</h1>
@foreach ($publicProcurements as $item)
@if($item->type =='oglasi')
<div class="news-container">
    <h3>{{ $item->name }} - {{$item->year}}</h3>
    
    <div class="buttons-wrapper">
        <a href="{{route('public.procurements.edit',['id' =>$item->id])}}">Измени</a>
    <form action="" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Избриши</button>
    </form>
    </div>
</div>
@endif
@endforeach
</div>


@endsection

