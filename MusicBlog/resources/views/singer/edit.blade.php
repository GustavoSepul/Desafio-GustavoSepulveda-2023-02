@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Singer
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Singer</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('singers.update', $singer->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('singer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
