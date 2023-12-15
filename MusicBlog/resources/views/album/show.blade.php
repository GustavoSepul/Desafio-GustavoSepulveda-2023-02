@extends('layouts.app')

@section('template_title')
    {{ $album->name ?? "{{ __('Show') Album" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row m-0 p-4">
            <div class="col-12 text-center">
                <span style="font-size: 30px;">Detalles del Álbum</span>
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
                        
                        @foreach ($songs as $song)
                        <p class="lead">
                            <strong>
                            {{ $loop->index + 1 }}. <a class="text-black" href="{{ route('songs.show',$song->id) }}">{{ $song->titulo}}</a>
                            <!-- @if(isset($song->audio))
                            <audio controls>
                            <source src="{{ Storage::url($song->audio) }}" type="audio/mp3">
                            </audio>
                            @endif -->
                            </strong>  
                        </p>   
                        
                        @endforeach
                            <hr>
                            <a class="btn btn-secondary" href="{{ route('albums.index') }}">Regresar</a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
