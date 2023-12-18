@extends('layouts.app')

@section('content')
<style>
    .carousel-control-prev,
.carousel-control-next {
    width: 5%;
}

/* Ajustar la posición vertical de los controles para centrarlos */
.carousel-control-prev,
.carousel-control-next {
    top: 50%;
    transform: translateY(-50%);
}

/* Ajustar el tamaño de los íconos de los controles */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 30px; /* Ajusta el tamaño según sea necesario */
    height: 30px;
    background-size: cover;
}

/* Opcional: Estilo adicional para resaltar los controles al pasar el ratón */
.carousel-control-prev:hover,
.carousel-control-next:hover {
    background-color: rgba(0, 0, 0, 0.2);
}
img {
    max-height: 253.4px;
}
.songs {
    cursor: pointer;
}
</style>
        @role('admin')
        
        @endrole
        <!-- {{$cancionesConMasLikes}} -->
        <div class="container">
            <h1 class="text-white">Populares</h1>
            <div id="popularCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($cancionesConMasLikes->chunk(4) as $key => $popularChunk)
                        <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                            <div class="row">
                                @foreach ($popularChunk as $popular)
                                    <div class="col-md-3">
                                        <div class="popular card animate__animated animate__fadeInRightBig">
                                            @if(isset($popular->song->caratula))
                                                <img class="" id="vinil" src="{{ asset('storage').'/'.$popular->song->caratula }}" alt="">
                                            @else
                                                @if(isset($popular->album_id))
                                                    @if(isset($popular->album->caratula))
                                                            <img class="" id="vinil" src="{{ asset('storage').'/'.$popular->album->caratula }}" alt="">
                                                    @else
                                                            <img class="" id="vinil" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" >
                                                    @endif 
                                                @else
                                                        <img class="" id="vinil" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" >
                                                @endif


                                            @endif
                                            <div class="card-body">
                                                <a class="text-black" href="{{ route('songs.show',$popular->song->id) }}"><h5 class="card-title">{{ $popular->song->titulo }}</h5></a>
                                                <p class="card-text">
                                                    <strong>Artista(s):</strong>
                                                    @foreach($popular->song->singers as $singer)
                                                    <a class="text-black" href="{{ route('singers.show',$singer->id) }}">{{ $singer->nombre }}</a>
                                                    @if(!$loop->last) , @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">
                                                    @if(isset($popular->song->album_id))
                                                    <strong>Album:</strong>
                                                    <a class="text-black" href="{{ route('albums.show',$popular->song->album->id) }}"> {{ $popular->song->album->titulo }}</a>
                                                    @else
                                                    <strong>Sencillo</strong>
                                                    @endif
                                                </p>
                                                <p class="card-text">
                                                <strong>Género:</strong> {{$popular->song->gender->nombre}}
                                                </p>
                                                <p class="card-text">
                                                <strong>Año de lanzamiento:</strong> {{$popular->song->anio}}
                                                </p>
                                            </div>
       
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h1 class="text-white">Canciones</h1>
            <div id="songCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($songs->chunk(4) as $key => $songChunk)
                        <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                            <div class="row">
                                @foreach ($songChunk as $song)
                                    <div class="col-md-3">
                                        <div class="song card">
                                            @if(isset($song->caratula))
                                                <img class="" id="vinil" src="{{ asset('storage').'/'.$song->caratula }}" alt="">
                                            @else
                                                @if(isset($song->album_id))
                                                    @if(isset($song->album->caratula))
                                                            <img class="" id="vinil" src="{{ asset('storage').'/'.$song->album->caratula }}" alt="">
                                                    @else
                                                            <img class="" id="vinil" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" >
                                                    @endif 
                                                @else
                                                        <img class="" id="vinil" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" >
                                                @endif


                                            @endif
                                            <div class="card-body">
                                                <a class="text-black" href="{{ route('songs.show',$song->id) }}"><h5 class="card-title">{{ $song->titulo }}</h5></a>
                                                <p class="card-text">
                                                    <strong>Artista(s):</strong>
                                                    @foreach($song->singers as $singer)
                                                    <a class="text-black" href="{{ route('singers.show',$singer->id) }}">{{ $singer->nombre }}</a>
                                                    @if(!$loop->last) , @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">
                                                    @if(isset($song->album_id))
                                                    <strong>Album:</strong>
                                                    <a class="text-black" href="{{ route('albums.show',$song->album->id) }}"> {{ $song->album->titulo }}</a>
                                                    @else
                                                    <strong>Sencillo</strong>
                                                    @endif
                                                </p>
                                                <p class="card-text">
                                                <strong>Género:</strong> {{$song->gender->nombre}}
                                                </p>
                                                <p class="card-text">
                                                <strong>Año de lanzamiento:</strong> {{$song->anio}}
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                @auth
                                                <div class="songs d-inline" id="{{$song->id}}">
                                                    <span class="{{$song->likes->contains('user_id',auth()->id()) ? 'text-danger':'text-dark' }}" id="heart{{$song->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                                    </svg>
                                                    </span>                        
                                                </div>
                                                @else
                                                <a href="/login" class="text-dark text-decoration-none" id="miEnlace{{ $loop->index}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                                    </svg>
                                                </a>                    
                                                @endauth
                                                <p class="d-inline" id="count{{$song->id}}"> Likes {{$song->likes->count()}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#songCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#songCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container mt-5">
            <h1>Álbumes</h1>
            <div id="albumCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($albums->chunk(4) as $key => $albumChunk)
                        <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                            <div class="row">
                                @foreach ($albumChunk as $album)
                                    <div class="col-md-3">
                                        <div class="album card">
                                            @if(isset($album->caratula))
                                            <img class="" id="vinil" src="{{ asset('storage').'/'.$album->caratula }}" alt="">
                                            @else
                                            <img class="" id="vinil" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" >
                                            @endif
                                            <div class="card-body">
                                                <a class="text-black" href="{{ route('albums.show',$album->id) }}"><h5 class="card-title">{{ $album->titulo }}</h5></a>
                                                <p class="card-text">
                                                <strong>Año de lanzamiento:</strong> {{$album->anio}} 
                                                </p>
                                                <p class="card-text">
                                                <strong>Autor: </strong> {{ $album->singer->nombre }}
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#albumCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#albumCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container mt-5">
            <h1>Artistas</h1>
            <div id="singerCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($singers->chunk(4) as $key => $singerChunk)
                        <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                            <div class="row">
                                @foreach ($singerChunk as $singer)
                                    <div class="col-md-3">
                                        <div class="album card">
                                            @if(isset($singer->imagen))
                                            <img class="" id="vinil" src="{{ asset('storage').'/'.$singer->imagen }}" alt="">
                                            @else
                                            <img class="" id="vinil" src="https://thumbs.dreamstime.com/b/female-singer-silhouette-white-background-vector-holding-microphone-84009046.jpg" alt="" >
                                            @endif
                                            <div class="card-body">
                                                <a class="text-black" href="{{ route('singers.show',$singer->id) }}"><h5 class="card-title">{{ $singer->nombre }}</h5></a>
                                                <p class="card-text">
                                                <strong>Año de Nacimiento: </strong> {{$singer->anio_nacimiento}} 
                                                </p>
                                                <p class="card-text">
                                                <strong>Pais de Origen: </strong>{{ $singer->country->name}}
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#singerCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#singerCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    var song = {!! json_encode($songs->toArray()) !!};
    var contador = 0;
    song.forEach(function (elemento) {
            var enlace = document.createElement("a");
            enlace.id = 'miEnlace' + contador;
            document.getElementById(enlace.id).addEventListener('click', function(event) {
                event.preventDefault();

                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Para dar me gusta debes iniciar sesión",
                showDenyButton: true,
                showCancelButton: true,
                denyButtonColor: "#5882FA", 
                confirmButtonText: "Iniciar Sesión",
                denyButtonText: `Registrarse`,
                cancelButtonText: "Cancelar"
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/login';
                } else if (result.isDenied) {
                    window.location.href = '/register';
                }
                });
            });
            contador++;
        });

</script>
<script>
    const token = document.querySelector('meta[name="csrf-token"]').content;
    let songs = document.querySelectorAll(".songs")

    songs.forEach(song => {       
        document.getElementById(song.id).addEventListener("click",e=>{            
            fetch("/like",{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                method: 'post',
                body: JSON.stringify({
                    id : song.id
                })
            }).then(response => { 
                response.json().then(data => {
                    let count = document.getElementById("count"+song.id)
                    count.innerHTML = " Likes "+data.count

                    let heart = document.getElementById("heart"+song.id)
                    heart.className = ""                    
                    heart.classList.add(data.color)
                })
            }).catch(error => {
                    console.log(error)
            });  
        })        
    });
</script>
@endsection
