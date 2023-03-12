@extends('layouts.app')
@if(auth())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('alert'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-bg-primary">
                        <h1>Profiel Bewerken</h1>
                    </div>
                    <div class="card-body">
                        <form action="/users/{{$user->id}}" method="POST">
                            @csrf
                            <input id="id"
                                   name="id"
                                   type="hidden"
                                   value="{{$user->id}}}">
                            <label for="name">Display naam: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{old("name", $user->name)}}"
                                   class="input-group input-group-text @error("name") is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="email">E-mail: </label>
                            <input id="email"
                                   name="email"
                                   type="text"
                                   value="{{old("description", $user->email)}}"
                                   class="input-group input-group-text @error("email") is-invalid @enderror">
                            @error("email")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="password">Wachtwoord: </label>
                            <input id="password"
                                   name="password"
                                   type="password"
                                   value=""
                                   class="input-group input-group-text @error("password") is-invalid @enderror">
                            @error("password")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="currentPassword">Huidig wachtwoord: </label>
                            <input id="currentPassword"
                                   name="password"
                                   type="password"
                                   value=""
                                   class="input-group input-group-text @error("password") is-invalid @enderror">
                            @error("currentPassword")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <br>
                            <input class="btn btn-primary" type="submit" value="Opslaan">
                        </form>
                        <br>
                        <div>
                            Leden status:
                            @if($user->role == 'guest')
                                <p>Toegang tot de ledensite is nog niet vrijgegeven</p>
                            @else
                                <p>Je hebt toegang tot de
                                    <a href="/home">ledensite.</a>
                                </p>
                            @endif
                            @if(auth()->user()->isAdmin())
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <div class="justify-content-center row row-cols-auto">
                                        <input id="id"
                                               name="id"
                                               type="hidden"
                                               value="{{$post->id}}">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@else
    <meta http-equiv="Refresh" content="0; url='/login'"/>
@endif
