<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $albume->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('anio') }}
            {{ Form::text('anio', $albume->anio, ['class' => 'form-control' . ($errors->has('anio') ? ' is-invalid' : ''), 'placeholder' => 'Anio']) }}
            {!! $errors->first('anio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('caratula') }}
            {{ Form::text('caratula', $albume->caratula, ['class' => 'form-control' . ($errors->has('caratula') ? ' is-invalid' : ''), 'placeholder' => 'Caratula']) }}
            {!! $errors->first('caratula', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>