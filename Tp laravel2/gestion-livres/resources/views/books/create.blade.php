@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un livre</h1>
    
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Titre*</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Auteur*</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Date de publication</label>
            <input type="date" name="published_at" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection 