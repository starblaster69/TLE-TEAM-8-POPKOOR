@extends('layouts.app')
@if(auth())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{$user->name}} </h1></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <br>
                                    <div class="form-group">
                                        <strong>E-mail:</strong>
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@else
    <meta http-equiv="Refresh" content="0; url='/404'"/>
@endif
