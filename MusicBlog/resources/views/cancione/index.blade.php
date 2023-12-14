@extends('layouts.app')

@section('template_title')
    Cancione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cancione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('canciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Titulo</th>
										<th>Album Id</th>
										<th>Artista Id</th>
										<th>Genero Id</th>
										<th>Duracion</th>
										<th>Anio</th>
										<th>Caratula</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($canciones as $cancione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cancione->titulo }}</td>
											<td>{{ $cancione->album_id }}</td>
											<td>{{ $cancione->artista_id }}</td>
											<td>{{ $cancione->genero_id }}</td>
											<td>{{ $cancione->duracion }}</td>
											<td>{{ $cancione->anio }}</td>
											<td>{{ $cancione->caratula }}</td>

                                            <td>
                                                <form action="{{ route('canciones.destroy',$cancione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('canciones.show',$cancione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('canciones.edit',$cancione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $canciones->links() !!}
            </div>
        </div>
    </div>
@endsection
