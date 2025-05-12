@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="display-1 text-danger">404</h1>
    <h2>Page non trouvée</h2>
    <p class="lead">Désolé, la page que vous cherchez n'existe pas.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">
        Retour à l'accueil
    </a>
</div>
@endsection