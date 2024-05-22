@extends('templates.base')

@section('content')
<div class="container mt-5">
    <div class="card bg-secondary bg-gradient text-white rounded-4">
       <div class="card-body text-center">
            <h1 class="display-4">Benvenuto!</h1>
            <h3>Questa è la lista dei nostri progetti</h3>
            <hr class="my-4">  
            <a class="btn btn-primary" href="{{ route('projects.create') }}">Aggiungi un progetto!</a>                        
       </div>
    </div>


 
    @session('delete_success')
        <div class="alert alert-success my-5" role="alert">
            {{ session('delete_success')->title }} eliminato con successo!
        </div>
    @endsession
    
    @session('update_success')
        <div class="alert alert-success my-5" role="alert">
            <a href="{{ route('projects.show', ['project' => session('update_success')->id]) }}">
                {{ session('update_success')->title }} modificato con successo!
            </a>
        </div>
    @endsession
    
    @session('create_success')
        <div class="alert alert-success my-5" role="alert">
            <a href="{{ route('projects.show', ['project' => session('create_success')->id]) }}">
                {{ session('create_success')->title }} creato con successo!
            </a>
        </div>
    @endsession

    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Data di Inizio</th>
                <th scope="col">Stato</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if ($projects->count())
                @foreach ($projects as $project)   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('projects.show', ['project' => $project->id]) }}">{{ $project->title }}</a></td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->updated_at }}</td>
                       @auth
                            <td>@if (Auth::user()->id === $project->user_id)
                                <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Elimina</button>
                                </form>   
                            @endif
                            </td>           
                            <td>
                                @if (Auth::user()->id === $project->user_id)
                                    <a class="btn btn-primary" href="{{ route('projects.edit', ['project' => $project->id]) }}">Modifica</a>                        
                                @endif
                            </td>
                    @endauth
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center"><h3>Non ci sono progetti</h3></td>
                </tr>
            @endif
        </tbody>
    </table>
 
    {{ $projects->links('vendor.pagination.bootstrap-5') }}
</div>
@endsection
