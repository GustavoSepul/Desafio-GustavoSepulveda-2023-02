<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $cancione->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Álbum') }}
            {{ Form::select('album_id', $albumes, $cancione->album_id, ['class' => 'form-control' . ($errors->has('album_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Álbum']) }}
            {!! $errors->first('album_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('artista') }}
            {{ Form::select('artista_id', $artistas, $cancione->artista_id, ['class' => 'form-control' . ($errors->has('artista_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Artista']) }}
            {!! $errors->first('artista_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('genero') }}
            {{ Form::select('genero_id', $generos, $cancione->genero_id, ['class' => 'form-control' . ($errors->has('genero_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Género']) }}
            {!! $errors->first('genero_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('duracion') }}
            {{ Form::text('duracion', $cancione->duracion, ['class' => 'form-control' . ($errors->has('duracion') ? ' is-invalid' : ''), 'placeholder' => 'Duracion']) }}
            {!! $errors->first('duracion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('anio') }}
            {{ Form::text('anio', $cancione->anio, ['class' => 'form-control' . ($errors->has('anio') ? ' is-invalid' : ''), 'placeholder' => 'Anio']) }}
            {!! $errors->first('anio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('caratula') }}
            {{ Form::text('caratula', $cancione->caratula, ['class' => 'form-control' . ($errors->has('caratula') ? ' is-invalid' : ''), 'placeholder' => 'Caratula']) }}
            {!! $errors->first('caratula', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>