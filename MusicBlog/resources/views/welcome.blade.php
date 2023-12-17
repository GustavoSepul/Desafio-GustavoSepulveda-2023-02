@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @role('admin')
        xd
        @endrole
        <!-- {{$cancionesConMasLikes}} -->
        @foreach ($songs as $song)
        <div class="col-sm-3 mt-5 mb-5">
            <div class="card h-100">
                @if(isset($song->caratula))
                <img class="card-img-top" src="{{ asset('storage').'/'.$song->caratula }}" width="100" alt="">
                @else
                <img class="card-img-top" src="https://thumbs.dreamstime.com/b/female-singer-silhouette-white-background-vector-holding-microphone-84009046.jpg" alt="" width="100">
                @endif
                <div class="card-body">
                            <center>{{$song->titulo}} </center>
                </div>
                <ul>
                    <li>
                    @if(isset($song->album_id))
                    <a class="text-black" href="{{ route('albums.show',$song->album->id) }}"><strong>Album:</strong> {{ $song->album->titulo }}</a>
                    @else
                    Sencillo
                    @endif
                    </li>
                    <li><strong>Género:</strong> {{$song->gender->nombre}} </li>
                    <li><strong>Año de lanzamiento:</strong> {{$song->anio}} </li>
                    <li><strong>Artista(s):</strong>
                        @foreach($song->singers as $singer)
                            {{ $singer->nombre }}
                            @if(!$loop->last) , @endif
                        @endforeach
                    </li>
                </ul>
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
        @foreach ($albums as $album)
        <div class="col-sm-3 mt-5 mb-5">
            <div class="card h-100">
                @if(isset($album->caratula))
                <img class="card-img-top" src="{{ asset('storage').'/'.$album->caratula }}" width="100" alt="">
                @else
                <img class="card-img-top" src="https://thumbs.dreamstime.com/b/female-singer-silhouette-white-background-vector-holding-microphone-84009046.jpg" alt="" width="100">
                @endif
                <div class="card-body">
                            <center>{{$album->titulo}} </center>
                </div>
                <ul>
                    <li><strong>Año de lanzamiento:</strong> {{$album->anio}} </li>
                    <li><strong>Autor:</strong>
                            {{ $album->singer->nombre }}
                    </li>
                </ul>
                <!-- <div class="card-footer">
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
                </div> -->
            </div>
        </div>
        @endforeach
        @foreach ($singers as $singer)
        <div class="col-sm-3 mt-5 mb-5">
            <div class="card h-100">
                @if(isset($singer->imagen))
                <img class="card-img-top" src="{{ asset('storage').'/'.$singer->imagen }}" width="100" alt="">
                @else
                <img class="card-img-top" src="https://thumbs.dreamstime.com/b/female-singer-silhouette-white-background-vector-holding-microphone-84009046.jpg" alt="" width="100">
                @endif
                <div class="card-body">
                            <center>{{$singer->nombre}} </center>
                </div>
                <ul>
                    <li><strong>Año de nacimiento:</strong> {{$singer->anio_nacimiento}} </li>
                    <li><strong>Pais de Origen:</strong>
                        {{ $singer->country->name}}
                    </li>
                </ul>
                <!-- <div class="card-footer">
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
                </div> -->
            </div>
        </div>
        @endforeach
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
