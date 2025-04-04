@extends('layouts.base')
@section('title', 'Bienvenue')
@section('content')

<h1>Formulaire D'ajout</h1>

    <form method="POST" action="/todo">
        @csrf 
        <label for="texte">Texte</label>
        <input type="text" name="texte" id="texte" required>
        
        <label for="termine">Terminé</label>
        <input type="checkbox" name="termine" id="termine" value="1">

        <button type="submit">Ajouter</button>
    </form>

<h1>Liste des tâches</h1>

    @foreach($todos as $todo)
        <p>{{ $todo->texte }}</p>
        <p>Terminé: {{ $todo->termine ? 'Oui' : 'Non' }}</p>
    @endforeach

<h1>Liste de 10</h1>

    @foreach($filters as $filter)
        <p>{{ $filter->texte }}</p>
        <p>Terminé: {{ $filter->termine ? 'Oui' : 'Non' }}</p>
    @endforeach

@endsection
