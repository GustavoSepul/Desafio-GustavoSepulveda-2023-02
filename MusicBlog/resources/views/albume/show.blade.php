@extends('layouts.app')

@section('template_title')
    {{ $albume->name ?? "{{ __('Show') Albume" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Albume</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('albumes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $albume->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Anio:</strong>
                            {{ $albume->anio }}
                        </div>
                        <div class="form-group">
                            <strong>Caratula:</strong>
                            {{ $albume->caratula }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
