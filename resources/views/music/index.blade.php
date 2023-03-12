@extends('layouts.app')
@if(auth()->guest())
    <meta http-equiv="Refresh" content="0; url='/login'"/>
@else
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Popkoor Singing Beat Repertoires</h1></div>

                    <div class="card-body">
                        @if(auth()->user()->isAdmin())
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('repertoire.create') }}"> Nieuw Nummer
                                    Toevoegen</a>
                            </div>
                        @endif

                        <table class="table table-responsive table-hover">
                            <tr>
                                <th>No</th>
                                <th>Titel</th>
                                <th>Artiest</th>
                                <th width="280px">Actie</th>
                            </tr>
                            @foreach ($musicTracks as $musicTrack)
                                <tr>
                                    <td>{{ $musicTrack->id }}</td>
                                    <td>{{ $musicTrack->title }}</td>
                                    <td>{{ $musicTrack->artist }}</td>
                                    <td>
                                        <form action="{{ route('repertoire.destroy',$musicTrack->id) }}" method="POST">

                                            <a class="btn btn-info"
                                               href="{{ route('repertoire.show',$musicTrack->id) }}">Openen</a>

                                            <a class="btn btn-primary"
                                               href="{{ route('repertoire.edit',$musicTrack->id) }}">Bewerken</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@endif
