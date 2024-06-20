<!-- resources/views/audio/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reproductor de Playlist</title>
    <style>
        /* Estilos personalizados para el reproductor de audio */
        #reproductor-audio {
            width: 300px;
            margin: 20px;
            background-color: black;
            padding: 10px;
            border-radius: 5px;
            color: white;
        }

        /* Otros estilos personalizados según tus necesidades */
    </style>
</head>
<body>
    <div id="reproductor-audio" class="text-white">
        <audio controls id="audio-player">
            <source src="{{ Storage::url($songs[0]->audio) }}" type="audio/mp3">
            Tu navegador no soporta el elemento de audio.
        </audio>

        <ul id="playlist">
            @foreach ($songs as $song)
                <li data-src="{{ Storage::url($song->audio) }}">{{ $song->titulo }}</li>
            @endforeach
        </ul>

        <button id="play-pause">Play/Pause</button>
        <button id="prev">Anterior</button>
        <button id="next">Siguiente</button>
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
</body>
</html>