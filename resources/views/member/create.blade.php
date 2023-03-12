@extends('layouts.app')
@if(auth()->guest())
    <meta http-equiv="Refresh" content="0; url='/404'"/>
@elseif(auth()->user()->isAdmin())
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Maak een nieuw ledenpost</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('member.index') }}"> Terug</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oeps!</strong> Er was iets mis met uw input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('member.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titel:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Titel">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Beschrijving:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Beschrijving"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>
        </div>

    </form>
@endsection

@else
    <meta http-equiv="Refresh" content="0; url='/404'"/>
@endif
