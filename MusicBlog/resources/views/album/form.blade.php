<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $album->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('singer_id') }}
            {{ Form::select('singer_id', $artistas, $album->singer_id, ['class' => 'form-control' . ($errors->has('singer_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Artista']) }}
            {!! $errors->first('singer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('anio') }}
            {!! Form::selectRange('anio', now()->year, now()->year - 100, isset($album) ? $album->anio : null, ['class' => 'form-control select_multiple' . ($errors->has('anio') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Año']) !!}
            {!! $errors->first('anio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('caratula') }}
            {{ Form::file('caratula', ['class' => 'form-control' . ($errors->has('caratula') ? ' is-invalid' : ''), 'placeholder' => 'Caratula']) }}
            {!! $errors->first('caratula', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.select_multiple').select2();
    });
</script>