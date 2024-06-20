@extends('layouts.app')

@section('template_title')
    {{ $album->name ?? "{{ __('Show') Album" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row m-0 p-4">
            <div class="col-12 text-center text-white">
                <span style="font-size: 30px;" >Detalles del Álbum</span>
            </div>   
        </div>

        
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                <div class="card p-4 bg-white">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                    @if(isset($album->caratula))
                    <div class="circular--landscape2">
                        <img class="" id="vinil" src="{{ asset('storage').'/'.$album->caratula }}" width="100" alt="">
                    </div>
                    @else
                    <div class="circular--landscape2">
                        <img class="" id="vinil" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" width="100">
                    </div>    
                    @endif
                        <p class="lead mt-3">
                            <strong>
                            {{ $album->titulo }}
                            </strong>
                        </p>
                        <p class="lead">
                            <strong>
                            {{ $album->singer->nombre}}
                            </strong>  
                        </p>
                        <p class="lead">
                            <strong>
                            {{ $album->anio }}
                            </strong>  
                        </p>
                        <p class="lead">
                            <strong>
                            Canciones:
                            </strong>  
                        </p>   
                        <div id="reproductor-audio" class="text-white">
                        <audio controls id="audio-player">
                            <source src="{{ Storage::url($songs[0]->audio) }}" type="audio/mp3">
                            Tu navegador no soporta el elemento de audio.
                        </audio>

                        <ul id="playlist">
                            @foreach ($songs as $song)
                                <li data-src="{{ Storage::url($song->audio) }}"><a class="text-white" href="{{ route('songs.show',$song->id) }}">{{ $song->titulo}}</a></li>
                            @endforeach
                        </ul>

                        <button id="play-pause">Play/Pause</button>
                        <button id="prev">Anterior</button>
                        <button id="next">Siguiente</button>
                    </div>
                            <hr>
                            <a class="btn btn-secondary" href="javascript:history.back()">Regresar</a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
                #reproductor-audio {
            width: 300px;
            margin: 20px;
            background-color: black;
            padding: 10px;
            border-radius: 5px;
            color: white;
            
        }
        #audio-player {
    max-width: 250px; /* Ajusta el ancho según tus necesidades */
}

    </style>
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
