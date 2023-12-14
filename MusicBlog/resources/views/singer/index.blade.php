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
                                <a href="{{ route('singers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Anio Nacimiento</th>
										<th>Nacionalidad</th>
										<th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($singers as $singer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $singer->nombre }}</td>
											<td>{{ $singer->anio_nacimiento }}</td>
											<td>{{ $singer->nacionalidad }}</td>
											<td>{{ $singer->imagen }}</td>

                                            <td>
                                                <form action="{{ route('singers.destroy',$singer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('singers.show',$singer->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('singers.edit',$singer->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $singers->links() !!}
            </div>
        </div>
    </div>
@endsection
