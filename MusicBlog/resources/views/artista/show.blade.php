@extends('layouts.app')

@section('template_title')
    {{ $artista->name ?? "{{ __('Show') Artista" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Artista</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('artistas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $artista->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Anio Nacimiento:</strong>
                            {{ $artista->anio_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Nacionalidad:</strong>
                            {{ $artista->nacionalidad }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $artista->imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
