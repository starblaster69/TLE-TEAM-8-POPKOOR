@extends('layouts.app')
@if(auth()->guest())
    <meta http-equiv="Refresh" content="0; url='/login'"/>
@elseif(auth()->user()->isAdmin() || auth()->user()->isVerified())
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
                    <div class="card-header"><h1>PSB Ledensite</h1></div>
                    <div class="card-body">
                        Beste leden, jullie zijn nu ingelogd op de ledensite. Dit is een plek alleen beschikbaar voor
                        leden van Popkoor Singing Beat. Hierbij een aantal mededelingen.
                        <br>
                        @if(auth()->user()->isAdmin())
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('member.create') }}"> Maak nieuwe
                                    ledenpost</a>
                            </div>
                        @endif
                        <br>
                        @foreach ($posts as $post)
                            <div class="card">
                                <div class="card-header"><h1><a href="{{route('member.show', $post->id)}}"
                                                                class="link page-link">{{$post->title}}</a></h1>
                                    <div class="justify-content-end row row-cols-auto">
                                        @if(auth()->user()->isAdmin())
                                            <a class="btn btn-primary" href="{{route('member.edit', $post->id)}}">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                        <div class="card-body">
                                            <h4>Beschrijving:</h4>
                                            <p>{{$post->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endsection
@else
    <meta http-equiv="Refresh" content="0; url='/404'"/>
@endif


