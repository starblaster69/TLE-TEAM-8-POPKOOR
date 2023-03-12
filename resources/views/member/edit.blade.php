@extends('layouts.app')
@if(auth()->guest())
    <meta http-equiv="Refresh" content="0; url='/404'"/>
@elseif(auth()->user()->isAdmin())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Bewerken</h1></div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Oeps!</strong> Er is iets mis met uw input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('member.update',$post->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div>
                                        <form action="{{route('member.destroy', $post->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="justify-content-center row row-cols-auto">
                                                <input id="id"
                                                       name="id"
                                                       type="hidden"
                                                       value="{{$post->id}}">
                                                <input type="submit" value="Verwijderen" class="btn btn-danger">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <strong>Titel:</strong>
                                        <input type="text" name="title" value="{{ $post->title }}" class="form-control"
                                               placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Beschrijving:</strong>
                                        <textarea class="form-control" style="height:150px" name="description"
                                                  placeholder="Description">{{ $post->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Opslaan</button>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('member.index') }}"> Terug</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@else
    <meta http-equiv="Refresh" content="0; url='/404'"/>
@endif
