@extends('layouts.base')
@section('title', 'Bienvenue')
@section('content')
 <h1>PONG</h1>
    <div class="links">
        <h1>{{ $word }}</h1>
    </div>

    @if($word === 'PING')
    <p>La page est en mode PING ({{ time() }}</p>
    @else
    <p>La page est en mode PONG ({{ time() }}</p>
    @endif


@endsection
