@extends('layouts.app')
@if(auth()->guest())
    <meta http-equiv="Refresh" content="0; url='/login'"/>
@elseif(auth()->user()->isAdmin() || auth()->user()->isVerified())
@else
    <meta http-equiv="Refresh" content="0; url='/404'"/>
@endif
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
                            <a class="btn btn-primary" href="{{ route('member.index') }}">Terug</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





