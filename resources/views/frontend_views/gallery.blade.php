@extends('frontend_views.layout.layout')

@section('title', 'Галерија')

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>ГАЛЕРИЈА</h1>
    </div>
</div>    
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

{{-- <script>
function openModal(imageSrc) {
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementById("modalImage");
  modal.style.display = "block";
  modalImg.src = imageSrc;
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}
</script> --}}

@endsection