@extends('layouts.app')
@if(!auth()->user())
    <meta http-equiv="Refresh" content="0; url='/register'"/>
@else
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header purple">{{ __('Status') }}</div>

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
                                    <input type="submit" value="Gebruikers"/>
                                </form>
                            </div>
                        @endif
                        @if(auth()->user()->role == 'member')
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
    <br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header purple">{{ __('Pages') }}</div>
                    <div class="card-body">
                        <div>
                            <h2>Welkom bij het Popkoor Singing Beat!</h2>
                            <text>
                                <div>
                                    Zingen maakt blij,

                                    - zingen is vrijheid,
                                    - zingen is gezellig,
                                    - zingen is samenwerking,
                                    - zingen is los van alles,
                                    - zingen is gewoon leuk,
                                    - dat vinden wij nou ook!

                                    Popkoor Singing Beat bestaat sinds maart 2001 en telt inmiddels zo’n 70 enthousiaste zangliefhebbers, maar we hebben zeker nog plaats voor Hoge en Lage stempartijen.

                                    Wie kan lid worden van Popkoor Singing Beat?
                                    Iedereen die van zingen houdt: JONG (vanaf 18 jaar) OF OUD, MAN OF VROUW.
                                    Dus lees verder en misschien wel TOT ZINGS!
                                </div>
                            </text>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header purple">{{ __('Posts') }}</div>
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
    <br/>
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header purple">{{ __('Recent Images') }}</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="img-fluid">Img 1</div>--}}
{{--                        <div class="img-fluid">Img 2</div>--}}
{{--                        <div class="img-fluid">Img 3</div>--}}
{{--                        <form action="/">--}}
{{--                            <label for="img">Select image:</label>--}}
{{--                            <input type="file" id="img" name="img" accept="image/*">--}}
{{--                            <input type="submit">--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@endif
