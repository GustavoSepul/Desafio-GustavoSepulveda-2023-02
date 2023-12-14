@extends('layouts.app')

@section('template_title')
    {{ $album->name ?? "{{ __('Show') Album" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Album</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('albums.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $album->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Singer Id:</strong>
                            {{ $album->singer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Anio:</strong>
                            {{ $album->anio }}
                        </div>
                        <div class="form-group">
                        @if(isset($album->caratula))
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$album->caratula }}" width="100" alt="">
                        @else
                            <img class="img-thumbnail img-fluid" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" width="100">
                        @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
