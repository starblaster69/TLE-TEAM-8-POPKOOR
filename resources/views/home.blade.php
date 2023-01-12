@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            Je bent ingelogd als {{ auth()->user()->role }}.
                        @if(auth()->user()->isAdmin())
                            <div>
                                <form action="/users">
                                    <input type="submit" value="Users"/>
                                </form>
                            </div>
                        @endif
                        @if(auth()->user()->isVerified())
                                <div>
                                    <form action="/member">
                                        <input type="submit" value="Ledensite"/>
                                    </form>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pages') }}</div>
                    <div class="card-body">
                        <div>
                            <h2>Welkom Leden!</h2>
                            <text>
                                <div>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularised in the
                                    1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
                                    recently with desktop publishing software like Aldus PageMaker including versions of
                                    Lorem Ipsum.
                                </div>
                            </text>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>
                    <div class="card-body">
                        @if(auth()->user()->isAdmin())
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('posts.create') }}"> Maak nieuwe post</a>
                        </div>
                        @endif
                        @foreach ($posts as $post)
                            <div class="card">
                                <div class="card-header"><h1><a href="{{route('posts.show', $post->id)}}"
                                                                class="link page-link">{{$post->title}}</a></h1>
                                    <div class="justify-content-end row row-cols-auto">
                                        @if(auth()->user()->isAdmin())
                                            <a class="btn btn-primary" href="{{route('posts.edit', $post->id)}}">
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
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Recent Images') }}</div>
                    <div class="card-body">
                        <div class="img-fluid">Img 1</div>
                        <div class="img-fluid">Img 2</div>
                        <div class="img-fluid">Img 3</div>
                        <form action="/">
                            <label for="img">Select image:</label>
                            <input type="file" id="img" name="img" accept="image/*">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
