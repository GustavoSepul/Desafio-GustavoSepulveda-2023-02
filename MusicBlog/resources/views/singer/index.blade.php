@extends('layouts.app')

@section('template_title')
    Singer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Singer') }}
                            </span>

                             <div class="float-right">
                             @role('admin')
                                <a href="{{ route('singers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar Nuevo Artista') }}
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
                                        
										<th>Nombre</th>
										<th>Año Nacimiento</th>
										<th>Pais</th>
										<th>Foto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($singers as $singer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $singer->nombre }}</td>
											<td>{{ $singer->anio_nacimiento }}</td>
											<td>{{ $singer->country->name}}</td>
											<td>
                                                @if(isset($singer->imagen))
                                                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$singer->imagen }}" width="100" alt="">
                                                @else
                                                <img class="img-thumbnail img-fluid" src="https://thumbs.dreamstime.com/b/female-singer-silhouette-white-background-vector-holding-microphone-84009046.jpg" alt="" width="100">
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('singers.destroy',$singer->id) }}" method="POST" class="formulario-eliminar">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('singers.show',$singer->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    @role('admin')
                                                    <a class="btn btn-sm btn-success" href="{{ route('singers.edit',$singer->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $singers->links() !!}
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
                'El artista se eliminó con éxito.',
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
                    'Artista agregado con éxito!',
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
            text: "El artista seleccionado se eliminará definitivamente",
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
