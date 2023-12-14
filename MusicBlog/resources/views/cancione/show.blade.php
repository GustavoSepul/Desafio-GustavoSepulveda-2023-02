@extends('layouts.app')

@section('template_title')
    {{ $cancione->name ?? "{{ __('Show') Cancione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cancione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('canciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $cancione->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Album Id:</strong>
                            {{ $cancione->album_id }}
                        </div>
                        <div class="form-group">
                            <strong>Artista Id:</strong>
                            {{ $cancione->artista_id }}
                        </div>
                        <div class="form-group">
                            <strong>Genero Id:</strong>
                            {{ $cancione->genero_id }}
                        </div>
                        <div class="form-group">
                            <strong>Duracion:</strong>
                            {{ $cancione->duracion }}
                        </div>
                        <div class="form-group">
                            <strong>Anio:</strong>
                            {{ $cancione->anio }}
                        </div>
                        <div class="form-group">
                            <strong>Caratula:</strong>
                            {{ $cancione->caratula }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
