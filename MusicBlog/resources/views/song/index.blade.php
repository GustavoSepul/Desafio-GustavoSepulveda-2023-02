@extends('layouts.app')

@section('template_title')
    Song
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Song') }}
                            </span>

                             <div class="float-right">
                                @role('admin')
                                <a href="{{ route('songs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar Nueva Canción') }}
                                </a>
                                @endrole
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="myTable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Titulo</th>
										<th>Álbum</th>
										<th>Género</th>
										<th>Año</th>
										<th>Artista(s)</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($songs as $song)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $song->titulo }}</td>
											<td>
                                                @if(isset($song->album_id))
                                                <a class="text-black" href="{{ route('albums.show',$song->album->id) }}">{{ $song->album->titulo }}</a>
                                                @else
                                                Sencillo
                                                @endif
                                            </td>
											<td>{{ $song->gender->nombre }}</td>
											<td>{{ $song->anio }}</td>
											<td>
                                            @foreach($song->singers as $singer)
                                                {{ $singer->nombre }}
                                                @if(!$loop->last) , @endif
                                            @endforeach

                                            </td>

                                            <td>
                                                <form action="{{ route('songs.destroy',$song->id) }}" method="POST" class="formulario-eliminar">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('songs.show',$song->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    @role('admin')
                                                    <a class="btn btn-sm btn-success" href="{{ route('songs.edit',$song->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    @endrole
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $songs->links() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('eliminar') == 'ok')

            <script>
                Swal.fire(
                '¡Eliminada!',
                'La canción se eliminó con éxito.',
                'success'
                )
            </script>

    @endif

    @if(session('editar') == 'ok')

            <script>
                Swal.fire(
                    '¡Cambios Guardados!',
                    '',
                    'success'
                    )
            </script>

    @endif

    @if(session('crear') == 'ok')

            <script>
                Swal.fire(
                    'Canción agregada con éxito!',
                    '',
                    'success'
                    )
            </script>

    @endif
    <script>

        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estas seguro?',
            text: "La canción seleccionada se eliminará definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });

        
    </script>
@endsection
