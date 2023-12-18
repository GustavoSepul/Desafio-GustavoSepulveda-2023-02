@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <h1>Listado de canciones favoritas</h1>
        </div>
        <ul>                
        @forelse (auth()->user()->likes as $like)

            <li><a href="/songs/{{ $like->song->id }}" class="text-black">{{ $like->song->titulo }}</a></li>
            
        @empty
        
        <div class="container">
            <h1>Aún no tienes canciones favoritas, puedes darle me gusta en el siguiente  <a href="/">link</a> </h1>
        </div>
        @endforelse
        </ul>
    </div>
</div>

@endsection
