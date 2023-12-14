@extends('layouts.app')

@section('template_title')
    {{ $song->name ?? "{{ __('Show') Song" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Song</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('songs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $song->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Album Id:</strong>
                            {{ $song->album_id }}
                        </div>
                        <div class="form-group">
                            <strong>Gender Id:</strong>
                            {{ $song->gender_id }}
                        </div>
                        <div class="form-group">
                            <strong>Anio:</strong>
                            {{ $song->anio }}
                        </div>
                        <div class="form-group">
                            <strong>Caratula:</strong>
                            {{ $song->caratula }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
