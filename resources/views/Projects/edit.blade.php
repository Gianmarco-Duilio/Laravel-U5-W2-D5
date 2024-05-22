@extends('templates.base')

@section('content')
    <h1>Modifica Progetto</h1>
    
    <form method="POST" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Data di Inizio</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date) }}">
            @error('start_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Stato</label>
            <select class="form-control" id="status" name="status">
                <option value="planned" @if(old('status', $project->status) == 'planned') selected @endif>Pianificato</option>
                <option value="in progress" @if(old('status', $project->status) == 'in progress') selected @endif>In Corso</option>
                <option value="completed" @if(old('status', $project->status) == 'completed') selected @endif>Completato</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        </div>
    </form>
@endsection
