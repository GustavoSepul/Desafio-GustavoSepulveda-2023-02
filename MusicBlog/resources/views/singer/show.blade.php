@extends('layouts.app')

@section('template_title')
    {{ $singer->name ?? "{{ __('Show') Singer" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Singer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('singers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $singer->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Anio Nacimiento:</strong>
                            {{ $singer->anio_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Nacionalidad:</strong>
                            {{ $singer->nacionalidad }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $singer->imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
