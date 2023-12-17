@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @role('admin')
        xd
        @endrole
        @foreach ($songs as $item)
        <div class="col-sm-3 mt-5 mb-5">
            <div class="card h-100">
                @if(isset($item->caratula))
                <img class="card-img-top" src="{{ asset('storage').'/'.$item->caratula }}" width="100" alt="">
                @else
                <img class="card-img-top" src="https://thumbs.dreamstime.com/b/female-singer-silhouette-white-background-vector-holding-microphone-84009046.jpg" alt="" width="100">
                @endif
                <div class="card-body">
                    {{$item->titulo}}         
                </div>
                <ul>
                    <li>
                    @if(isset($item->album_id))
                    <a class="text-black" href="{{ route('albums.show',$item->album->id) }}">{{ $item->album->titulo }}</a>
                    @else
                    Sencillo
                    @endif
                    </li>
                    <li>{{$item->gender->nombre}} </li>
                    <li>{{$item->anio}} </li>
                    <li>
                        @foreach($item->singers as $singer)
                            {{ $singer->nombre }}
                            @if(!$loop->last) , @endif
                        @endforeach
                    </li>
                </ul>

                <div class="card-footer">
                    @auth
                    <div class="songs d-inline" id="{{$item->id}}">
                        <span class="{{$item->likes->contains('user_id',auth()->id()) ? 'text-danger':'text-dark' }}" id="heart{{$item->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                          </svg>
                        </span>                        
                    </div>
                    @else
                    <a href="/login" class="text-dark text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                        </svg>
                    </a>                    
                    @endauth
                    <p class="d-inline" id="count{{$item->id}}"> Likes {{$item->likes->count()}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
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
