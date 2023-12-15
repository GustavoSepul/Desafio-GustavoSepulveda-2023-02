@extends('layouts.app')

@section('template_title')
    {{ $song->name ?? "{{ __('Show') Song" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row m-0 p-4">
            <div class="col-12 text-center">
                <span style="font-size: 30px;">Detalles de la Canción</span>
            </div>   
        </div>

        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                <div class="card p-4 bg-white">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                    @if(isset($song->caratula))
                        <div class="foto-circular">
                            <img class="" id="vinil" src="{{ asset('storage').'/'.$song->caratula }}" width="100" alt="">
                        </div>
                    @else
                        @if(isset($song->album_id))
                            @if(isset($album->caratula))
                                <div class="foto-circular">
                                    <img class="" id="vinil" src="{{ asset('storage').'/'.$song->album->caratula }}" width="100" alt="">
                                </div>
                            @else
                                <div class="foto-circular">
                                    <img class="" id="vinil" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" width="100">
                                </div>  
                            @endif 
                        @else
                            <div class="foto-circular">
                                <img class="" id="vinil" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" width="100">
                            </div> 
                        @endif


                    @endif
                        <p class="lead mt-3">
                            <strong>
                            {{ $song->titulo }}
                            </strong>
                        </p>
                        <p class="lead">
                            <strong>
                            @if(isset($song->album_id))
                            {{ $song->album->titulo }}
                            @else
                            Sencillo
                            @endif
                            </strong>  
                        </p>
                        <p class="lead">
                            <strong>
                            {{ $song->gender->nombre }}
                            </strong>  
                        </p>
                        <p class="lead">
                            <strong>
                            {{ $song->anio }}
                            </strong>  
                        </p>
                        @if(isset($song->audio))
                            <audio id="miReproductor" controls>
                                <source src="{{ Storage::url($song->audio) }}" type="audio/mp3">
                            </audio>
                        @endif
                            <hr>
                            <a class="btn btn-secondary" href="{{ route('songs.index') }}">Regresar</a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    $(document).ready(function () {
        var reproductor = document.getElementById('miReproductor');
        var imagen = document.getElementById('vinil');

        reproductor.addEventListener('play', function () {
            console.log('Reproduciendo...');
            imagen.classList.add('vinilo');
        });

        reproductor.addEventListener('pause', function () {
            console.log('Pausado...');
            imagen.classList.remove('vinilo');
        });

    });
</script>
@endsection
