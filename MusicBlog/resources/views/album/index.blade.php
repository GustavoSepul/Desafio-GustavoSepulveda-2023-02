@extends('layouts.app')

@section('template_title')
    Album
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Album') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('albums.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar Nuevo Album') }}
                                </a>
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
                                        
										<th>Título</th>
										<th>Autor</th>
										<th>Año</th>
										<th>Carátula</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($albums as $album)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $album->titulo }}</td>
											<td>{{ $album->singer->nombre}}</td>
											<td>{{ $album->anio }}</td>
											<td>
                                                @if(isset($album->caratula))
                                                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$album->caratula }}" width="100" alt="">
                                                @else
                                                <img class="img-thumbnail img-fluid" src="https://dbdzm869oupei.cloudfront.net/img/vinylrugs/preview/18784.png" alt="" width="100">
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('albums.destroy',$album->id) }}" method="POST" class="formulario-eliminar">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('albums.show',$album->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('albums.edit',$album->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $albums->links() !!}
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
                'El album se eliminó con éxito.',
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
                    'Album agregado con éxito!',
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
            text: "El album seleccionado se eliminará definitivamente",
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
