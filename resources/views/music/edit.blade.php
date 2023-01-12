@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Nummer Bewerken</h1></div>

                    <div class="card-body">
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

                        <form action="{{ route('repertoire.update',$musicTrack->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h3>Algemene Informatie</h3>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Titel:</strong>
                                        <input type="text" value="{{ $musicTrack->title }}" name="title" class="form-control" placeholder="Titel">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Artiest:</strong>
                                        <input type="text" value="{{ $musicTrack->artist }}" name="artist" class="form-control" placeholder="Artiest">
                                    </div>
                                </div>

                                {{--            tekst en pdf bestanden--}}
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h3>Songteksten, regie en Bladmuziek</h3>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Songtekst:</strong>
                                        <input type="file" value="{{ $musicTrack->lyrics }}" name="lyrics" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.rtf,.txt,.xml">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Vertaling:</strong>
                                        <input type="file" value="{{ $musicTrack->translation }}" name="translation" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.rtf,.txt,.xml">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Koorregie:</strong>
                                        <input type="file" value="{{ $musicTrack->choralDirection }}" name="choralDirection" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.rtf,.txt,.xml">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Bladmuziek:</strong>
                                        <input type="file" value="{{ $musicTrack->sheetMusic }}" name="sheetMusic" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.rtf,.txt,.xml">
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
                                        <input type="file" value="{{ $musicTrack->full }}" name="full" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Instrumentaal:</strong>
                                        <input type="file" value="{{ $musicTrack->instrumental }}" name="instrumental" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Solo:</strong>
                                        <input type="file" value="{{ $musicTrack->solo }}" name="solo" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Solo Man:</strong>
                                        <input type="file" value="{{ $musicTrack->soloM }}" name="soloM" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Solo Vrouw:</strong>
                                        <input type="file" value="{{ $musicTrack->soloF }}" name="soloF" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Hoog:</strong>
                                        <input type="file" value="{{ $musicTrack->high }}" name="high" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Hoog 2:</strong>
                                        <input type="file" value="{{ $musicTrack->high2 }}" name="high2" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Hoog midden:</strong>
                                        <input type="file" value="{{ $musicTrack->highMid }}" name="highMid" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Hoog Midden 2:</strong>
                                        <input type="file" value="{{ $musicTrack->highMid2 }}" name="highMid2" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Laag midden:</strong>
                                        <input type="file" value="{{ $musicTrack->lowMid }}" name="lowMid" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Laag midden 2:</strong>
                                        <input type="file" value="{{ $musicTrack->lowMid2 }}" name="lowMid2" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Laag:</strong>
                                        <input type="file" value="{{ $musicTrack->low }}" name="low" accept="audio/*">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Laag 2:</strong>
                                        <input type="file" value="{{ $musicTrack->low2 }}" name="low2" accept="audio/*">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Opslaan</button>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('repertoire') }}"> Terug</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
