@extends("admin_views.layout.admin_layout")


@section("title", 'Planovi')

@section('content')
<div class="add">
    <a href="/admin/projects/add">Додади</a>
</div>
<div class="news-list">
    @if ($projects->count() > 0)
            @foreach ($projects as $item)
                <div class="news-container">
                    <h3>{{ $item->name }}</h3>
                    <div class="buttons-wrapper">
                        <a href="{{route('edit.project', ['id'=> $item->id])}}">Edit</a>
                    <form action="{{ route('project.destroy', ['id' => $item->id] )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </div>
                </div>
            @endforeach
        
    @else
        <p>Нема пронајдени пројекти</p>
    @endif
</div>


@endsection