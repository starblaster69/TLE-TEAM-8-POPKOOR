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
                        @if(auth()->user()->isAdmin())
                            {{ __('Hello admin!') }}
                        @endif
                        {{ __('You are logged in!') }}
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
                            <button routerLink="users">Users</button>
                            <button routerLink="posts">Posts</button>
                        </div>
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
