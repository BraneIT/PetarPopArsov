@extends('frontend_views.layout.layout')

@section('title', 'Галерија')

@section('page_header')
<h1>Галерија</h1>
@endsection
   
@section('content')

<div id="gallery">
    <div class="gallery-wrapper">
        @foreach($images as $item)
            <div class="image-container">
                <img src="{{ asset($item->image) }}" alt="" class="gallery-image" onclick="openModal('{{ asset($item->image) }}')">
            </div>
        @endforeach
    </div>
</div>
    
<div id="myModal" class="modal">
    <div class="modal-header">
    <span class="modal-close" onclick="closeModal()">&times;</span>
  </div>
  <span class="modal-content">
    <img id="modalImage" class="modal-image">
    
  </span>
</div>


@endsection