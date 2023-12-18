<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $singer->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Año de Nacimiento') }}
            {!! Form::selectRange('anio_nacimiento', now()->year, now()->year - 100, isset($singer) ? $singer->anio_nacimiento : null, ['class' => 'form-control elegir_pais' . ($errors->has('anio_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Año']) !!}
            {!! $errors->first('anio_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Pais de Origen') }}
            {{ Form::select('pais_id', $paises, $singer->pais_id, ['class' => 'form-control elegir_pais' . ($errors->has('pais_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Pais']) }}
            {!! $errors->first('pais_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen', ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.elegir_pais').select2();
    });
</script>