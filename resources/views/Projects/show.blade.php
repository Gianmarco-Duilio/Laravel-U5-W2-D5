@extends('templates.base')

@section('content')

    <h1>{{ $project->title }}</h1>
   
    <h3>{{ $project->description }}</h3>
    <p>{{ $project->start_date }}</p>
    <p>{{ $project->status }}</p>
    <p>{{ $project->created_at }}</p>
    <p>{{ $project->updated_at }}</p>

  
    @auth
        @if (Auth::user()->id === $project->user_id)
            <a class="btn btn-primary" href="{{ route('projects.edit', ['project' => $project->id]) }}">Modifica</a>
            <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST" style="display: inline;">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" onclick="return">Elimina</button>
            </form>
        @endif
    @endauth
@endsection
