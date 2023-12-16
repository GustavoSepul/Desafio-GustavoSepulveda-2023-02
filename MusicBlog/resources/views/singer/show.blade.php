@extends('layouts.app')

@section('template_title')
    {{ $singer->name ?? "{{ __('Show') Singer" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row m-0 p-4">
            <div class="col-12 text-center">
                <span style="font-size: 30px;">Detalles del Artista</span>
            </div>   
        </div>

        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                <div class="card p-4 bg-white">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                    @if(isset($singer->imagen))
                        <div class="foto-circular">
                            <img class="" id="vinil" src="{{ asset('storage').'/'.$singer->imagen }}" width="100" alt="">
                        </div>
                    @else
                        <div class="foto-circular">
                            <img class="" id="vinil" src="https://thumbs.dreamstime.com/b/female-singer-silhouette-white-background-vector-holding-microphone-84009046.jpg" alt="" width="100">
                        </div> 
                    @endif
                        <p class="lead mt-3">
                            <strong>
                            {{ $singer->nombre }}
                            </strong>
                        </p>
                        <p class="lead">
                            <strong>
                            {{ $singer->anio_nacimiento }}
                            </strong>  
                        </p>
                        <p class="lead">
                            <strong>
                            {{ $singer->country->name}}
                            </strong>  
                        </p>
                            <hr>
                            <a class="btn btn-secondary" href="javascript:history.back()">Regresar</a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
