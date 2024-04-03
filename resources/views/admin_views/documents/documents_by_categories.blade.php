@extends('admin_views.layout.admin_layout')
@section('title', 'Galery')

@section('content')
<div class="add">
    <a href="/admin/documents/add">Add</a>
    <a href="/admin/documents" ">Back</a>
</div>
<h2 class="label">{{$category->name}}</h2>
<div class="news-list">
  @if ($documents->count() > 0)
            @foreach ($documents as $item)
                <div class="news-container">
                    <h3>{{ $item->title }}</h3>
                    <div class="buttons-wrapper">
                        <a href="/admin/documents/edit/{{$item->category_id}}/{{$item->id}}">Edit</a>
                    <form action="{{ route('document.destroy', ['category_id' => $item->category_id, 'id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </div>
                </div>
            @endforeach
        
    @else
        <p>No documents found.</p>
    @endif
</div>  
@endsection