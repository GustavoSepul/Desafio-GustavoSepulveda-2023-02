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
                                @if(isset($singer->imagen))
                                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$singer->imagen }}" width="100" alt="">
                                @else
                                    <img class="img-thumbnail img-fluid" src="https://thumbs.dreamstime.com/b/female-singer-silhouette-white-background-vector-holding-microphone-84009046.jpg" alt="" width="100">
                                @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
