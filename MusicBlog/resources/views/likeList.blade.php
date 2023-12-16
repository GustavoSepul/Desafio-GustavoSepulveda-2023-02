@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul>                
        @forelse (auth()->user()->likes as $like)
            <li><a href="/songs/{{ $like->song->id }}">{{ $like->song->titulo }}</a></li>
        @empty

        @endforelse
        </ul>
    </div>
</div>

@endsection
