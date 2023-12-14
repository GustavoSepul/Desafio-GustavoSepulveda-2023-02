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
                                <a href="{{ route('songs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Gender Id</th>
										<th>Anio</th>
										<th>Caratula</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($songs as $song)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $song->titulo }}</td>
											<td>{{ $song->album_id }}</td>
											<td>{{ $song->gender_id }}</td>
											<td>{{ $song->anio }}</td>
											<td>{{ $song->caratula }}</td>

                                            <td>
                                                <form action="{{ route('songs.destroy',$song->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('songs.show',$song->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('songs.edit',$song->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $songs->links() !!}
            </div>
        </div>
    </div>
@endsection
