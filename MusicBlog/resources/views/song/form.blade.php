<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $song->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Álbum') }}
            {{ Form::select('album_id', $albumes, $song->album_id, ['class' => 'form-control' . ($errors->has('album_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Álbum']) }}
            {!! $errors->first('album_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Género') }}
            {{ Form::select('gender_id', $generos, $song->gender_id, ['class' => 'form-control' . ($errors->has('gender_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Género']) }}
            {!! $errors->first('gender_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="singers" class="form-label">Artista(as)</label>
            <select class="select_multiple form-control" name="singers[]" multiple="multiple" placeholder="Seleccione un artista">
            @foreach($singers as $singer)
                <option value="{{ $singer->id }}" {{ isset($selectedSingers) && in_array($singer->id, $selectedSingers) ? 'selected' : '' }}>{{ $singer->nombre }}</option>
            @endforeach
            </select>

                    @error('singers')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('anio') }}
            {!! Form::selectRange('anio', now()->year, now()->year - 100, isset($song) ? $song->anio : null, ['class' => 'form-control select_multiple' . ($errors->has('anio') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Año']) !!}
            {!! $errors->first('anio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('caratula') }}
            {{ Form::file('caratula', ['class' => 'form-control' . ($errors->has('caratula') ? ' is-invalid' : ''), 'placeholder' => 'Caratula']) }}
            {!! $errors->first('caratula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('audio') }}
            {{ Form::file('audio', ['class' => 'form-control' . ($errors->has('audio') ? ' is-invalid' : ''), 'placeholder' => 'Audio']) }}
            {!! $errors->first('audio', '<div class="invalid-feedback">:message</div>') !!}
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
<script>
</script>