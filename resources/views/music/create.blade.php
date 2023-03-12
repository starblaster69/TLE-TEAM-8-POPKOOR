@extends('layouts.app')
@if(auth()->guest())
    <meta http-equiv="Refresh" content="0; url='/login'"/>
@elseif(auth()->user()->isAdmin())
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Nummer Toevoegen</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('repertoire.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('repertoire.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h3>Algemene Informatie</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titel:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Titel">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Artiest:</strong>
                    <input type="text" name="artist" class="form-control" placeholder="Artiest">
                </div>
            </div>

{{--            tekst en pdf bestanden--}}
            <div class="col-xs-12 col-sm-12 col-md-12">
              <h3>Songteksten, regie en Bladmuziek</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Songtekst:</strong>
                    <input type="file" id="lyrics" name="textfile[]" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.rtf,.txt,.xml">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Vertaling:</strong>
                    <input type="file" id="translation" name="textfile[]" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.rtf,.txt,.xml">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Koorregie:</strong>
                    <input type="file" id="choralDirection" name="textfile[]" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.rtf,.txt,.xml">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bladmuziek:</strong>
                    <input type="file" id="sheetMusic" name="textfile[]" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.rtf,.txt,.xml">
                </div>
            </div>

{{--            audiobestanden, volledige nummers en individuele stempartijen--}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h3>Beschikbare Stempartijen.</h3>
                <p>Deze kunnen leeg worden gelaten.</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Compleet:</strong>
                    <input type="file" id="full" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Instrumentaal:</strong>
                    <input type="file" id="instrumental" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Solo:</strong>
                    <input type="file" id="solo" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Solo Man:</strong>
                    <input type="file" id="soloM" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Solo Vrouw:</strong>
                    <input type="file" id="soloF" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hoog:</strong>
                    <input type="file" id="high" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hoog 2:</strong>
                    <input type="file" id="high2" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hoog midden:</strong>
                    <input type="file" id="highMid" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hoog Midden 2:</strong>
                    <input type="file" id="highMid2" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Laag midden:</strong>
                    <input type="file" id="lowMid" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Laag midden 2:</strong>
                    <input type="file" id="lowMid2" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Laag:</strong>
                    <input type="file" id="low" name="audiofile[]" accept="audio/*">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Laag 2:</strong>
                    <input type="file" id="low2" name="audiofile[]" accept="audio/*">
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
