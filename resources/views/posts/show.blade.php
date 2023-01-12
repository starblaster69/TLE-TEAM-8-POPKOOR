@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Details</h1></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    {{ $post->title }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Details:</strong>
                                    {{ $post->description }}
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('home') }}">Terug</a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                @foreach ($comments as $comment)--}}

{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <form action="{{ route('posts.makeComment') }}" method="POST">--}}
{{--                    @csrf--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="hidden" name="postId" class="form-control" value="{{ $post->id }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="hidden" name="userId" class="form-control" value="{{ $post->id }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>Write Comment:</strong>--}}
{{--                                <textarea class="form-control" style="height:150px" name="content" placeholder="content"></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection





