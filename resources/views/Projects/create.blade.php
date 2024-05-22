@extends('templates.base')

@section('content')
    <h1>Create Project</h1>
    
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" class="form-control" id="description" placeholder="Description" name="description">
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Data di Inizio</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="planned">Pianificato</option>
                <option value="in progress">In Corso</option>
                <option value="completed">Completato</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
