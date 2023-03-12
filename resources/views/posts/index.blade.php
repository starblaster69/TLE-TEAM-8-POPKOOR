@extends('layouts.app')
@if(auth()->user()->role == 'admin')
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
                    <div class="card-header"><h1>Popkoor Singing Beat Evenementen</h1></div>

                    <div class="card-body">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('posts.create') }}"> Maak nieuwe post</a>
                        </div>

                        <table class="table table-responsive table-hover">
                            <tr>
                                <th>No</th>
                                <th>Titel</th>
                                <th>Beschrijving</th>
                                <th width="280px">Actie</th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Meer</a>

                                            <a class="btn btn-primary"
                                               href="{{ route('posts.edit',$post->id) }}">Bewerken</a>

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



        {!! $posts->links() !!}

        @endsection

@else
    <meta http-equiv="Refresh" content="0; url='/404'"/>
@endif
