@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container text-white">
            <h1>Listado de canciones favoritas</h1>
        </div>
        <ul>                
        @if (count(auth()->user()->likes) === 0)
            <div class="container text-white">
                <h1>Aún no tienes canciones favoritas, puedes darle me gusta en el siguiente  <a href="/">link</a> </h1>
            </div>
        @else
            <div id="reproductor-audio" class="text-white">
                <audio controls id="audio-player">
                    <source src="{{ Storage::url(auth()->user()->likes[0]->song->audio  ) }}" type="audio/mp3">
                    Tu navegador no soporta el elemento de audio.
                </audio>

                <ul id="playlist"> 
                    @forelse (auth()->user()->likes as $like)
                        <li data-src="{{ Storage::url($like->song->audio) }}">{{ $like->song->titulo }}</li>
                        @empty
                        <div class="container text-white">
                        <h1>Aún no tienes canciones favoritas, puedes darle me gusta en el siguiente  <a href="/">link</a> </h1>
                        </div>
                    @endforelse
                </ul>

                <button id="play-pause">Play/Pause</button>
                <button id="prev">Anterior</button>
                <button id="next">Siguiente</button>
            </div>
        @endif

            
        
        

        </ul>
    </div>
</div>
<script>
            const audioPlayer = document.getElementById('audio-player');
        const playlist = document.getElementById('playlist');
        const playlistItems = playlist.getElementsByTagName('li');
        const playPauseButton = document.getElementById('play-pause');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');

        let currentSongIndex = 0;

        function playPause() {
            if (audioPlayer.paused) {
                audioPlayer.play();
            } else {
                audioPlayer.pause();
            }
        }

        function playNext() {
            currentSongIndex = (currentSongIndex + 1) % playlistItems.length;
            loadSongAndPlay();
        }

        function playPrev() {
            currentSongIndex = (currentSongIndex - 1 + playlistItems.length) % playlistItems.length;
            loadSongAndPlay();
        }

        function loadSongAndPlay() {
            const songSrc = playlistItems[currentSongIndex].getAttribute('data-src');
            audioPlayer.src = songSrc;
            audioPlayer.play();
        }

        playPauseButton.addEventListener('click', playPause);
        nextButton.addEventListener('click', playNext);
        prevButton.addEventListener('click', playPrev);

        for (let i = 0; i < playlistItems.length; i++) {
            playlistItems[i].addEventListener('click', function () {
                currentSongIndex = i;
                loadSongAndPlay();
            });
        }
</script>

@endsection
