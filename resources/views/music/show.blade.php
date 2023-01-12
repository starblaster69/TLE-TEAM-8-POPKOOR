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
{{--                                    moet worden opgeschoond en uitgebreid, wss foreachen, maar aangezien t nog niet werkt,--}}
                                    <table class="table table-responsive table-hover">
                                        <tr>
                                            <th>id {{ $musicTrack->id }}</th>
                                            <th>titel {{ $musicTrack->title }}</th>
                                            <th>artiest {{ $musicTrack->artist }}</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td><strong>Songtekst</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td align="right"><a  class="btn btn-info" href="{{ $musicTrack->lyrics }}" target="_blank">open</a></td>
                                            <td align="right"><a class="btn btn-primary" href="{{ $musicTrack->lyrics }}" download>download</a></td>
                                        </tr>
                                        <tr>
                                            <th><h3>Stemgroepen</h3></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td><strong>Compleet</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td align="right"><a class="btn btn-info" href="{{ $musicTrack->full }}" target="_blank">open</a></td>
                                            <td align="right"><a class="btn btn-primary" href="{{ $musicTrack->full }}" download>download</a></td>
                                        </tr>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('repertoire.index') }}">Terug</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
