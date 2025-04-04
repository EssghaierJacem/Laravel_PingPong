@extends('layouts.base')
@section('title', 'Index Todo')
@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Texte</th>
                <th>Terminé</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->texte }}</td>
                    <td>{{ $todo->termine ? 'Oui' : 'Non' }}</td>
                    <td>
                        @if(!$todo->termine)
                            <span>Impossible de supprimer (non terminé)</span>
                        @else
                            <a href="/todo/supprimer/{{ $todo->id }}">Supprimer</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
