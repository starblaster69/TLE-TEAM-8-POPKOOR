<?php

namespace App\Http\Controllers;

use App\Models\musicTrack;
use Illuminate\Http\Request;

class MusicTracksController extends Controller
{
    public function index()
    {
        $musicTracks = musicTrack::all();

        return view('music.index',compact('musicTracks'));
    }

    public function create()
    {
        return view('music.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'textfile.*' => 'mimes:csv,txt,xlx,xls,pdf,doc,docx,rtf,xml',
            'audiofile.*' => 'mimes:mp3,wav,ogg,mid,midi',
        ]);

        $trackTitle = $request->title;
        $musicModel = new musicTrack();

        $musicModel->title = $request->title;
        $musicModel->artist = $request->artist;

        $i = 0;
        if ($request->file('textfile')){
            foreach ($request->file('textfile') as $key => $file) {
                if (isset($file)) {
                    $filePath = $file->move(public_path("uploads/$trackTitle/"), $file->getClientOriginalName());

                    switch ($i){
                        case 0:
                            $musicModel->lyrics = '/storage/' . $filePath;
                            break;
                        case 1:
                            $musicModel->translation = '/storage/' . $filePath;
                            break;
                        case 2:
                            $musicModel->choralDirection = '/storage/' . $filePath;
                            break;
                        case 3:
                            $musicModel->sheetMusic = '/storage/' . $filePath;
                            break;
                        default:
                            break;
                    }
                }
                $i++;
            }
        }

        $i = 0;
        if ($request->file('audiofile')){
            foreach ($request->file('audiofile') as $key => $file) {
                if (isset($file)) {
                    $filePath = $file->move(public_path("uploads/$trackTitle/"), $file->getClientOriginalName());

                    switch ($i){
                    case 0:
                        $musicModel->full = '/storage/' . $filePath;
                        break;
                    case 1:
                        $musicModel->instrumental = '/storage/' . $filePath;
                        break;
                    case 2:
                        $musicModel->solo = '/storage/' . $filePath;
                        break;
                    case 3:
                        $musicModel->soloM = '/storage/' . $filePath;
                        break;
                    case 4:
                        $musicModel->soloF = '/storage/' . $filePath;
                        break;
                    case 5:
                        $musicModel->high = '/storage/' . $filePath;
                        break;
                    case 6:
                        $musicModel->high2 = '/storage/' . $filePath;
                        break;
                    case 7:
                        $musicModel->highMid = '/storage/' . $filePath;
                        break;
                    case 8:
                        $musicModel->highMid2 = '/storage/' . $filePath;
                        break;
                    case 9:
                        $musicModel->lowMid = '/storage/' . $filePath;
                        break;
                    case 10:
                        $musicModel->lowMid2 = '/storage/' . $filePath;
                        break;
                    case 11:
                        $musicModel->low = '/storage/' . $filePath;
                        break;
                    case 12:
                        $musicModel->low2 = '/storage/' . $filePath;
                        break;
                    default:
                        break;
                    }
                }
                $i++;
            }
        }
        $musicModel->save();

        $musicTracks = musicTrack::all();

        return view('music.index',compact('musicTracks'))
            ->with('success','Track added successfully.');
//            ->with('file', $fileName);
    }

    public function show(musicTrack $musicTrack)
    {

        return view('music.show',compact('musicTrack'));
    }

    public function edit(musicTrack $musicTrack)
    {
        return view('music.edit',compact('musicTrack'));
    }

    public function update(Request $request, musicTrack $musicTrack)
    {

        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'textfile.*' => 'mimes:csv,txt,xlx,xls,pdf,doc,docx,rtf,xml',
            'audiofile.*' => 'mimes:mp3,wav,ogg,mid,midi',
        ]);

        $trackTitle = $request->title;
        $musicModel = new musicTrack();

        $musicModel->title = $request->title;
        $musicModel->artist = $request->artist;

        $i = 0;
        if ($request->file('textfile')){
            foreach ($request->file('textfile') as $key => $file) {
                if (isset($file)) {
                    $filePath = $file->move(public_path("uploads/$trackTitle/"), $file->getClientOriginalName());

                    switch ($i){
                        case 0:
                            $musicModel->lyrics = '/storage/' . $filePath;
                            break;
                        case 1:
                            $musicModel->translation = '/storage/' . $filePath;
                            break;
                        case 2:
                            $musicModel->choralDirection = '/storage/' . $filePath;
                            break;
                        case 3:
                            $musicModel->sheetMusic = '/storage/' . $filePath;
                            break;
                        default:
                            break;
                    }
                }
                $i++;
            }
        }

        $i = 0;
        if ($request->file('audiofile')){
            foreach ($request->file('audiofile') as $key => $file) {
                if (isset($file)) {
                    $filePath = $file->move(public_path("uploads/$trackTitle/"), $file->getClientOriginalName());

                    switch ($i){
                        case 0:
                            $musicModel->full = '/storage/' . $filePath;
                            break;
                        case 1:
                            $musicModel->instrumental = '/storage/' . $filePath;
                            break;
                        case 2:
                            $musicModel->solo = '/storage/' . $filePath;
                            break;
                        case 3:
                            $musicModel->soloM = '/storage/' . $filePath;
                            break;
                        case 4:
                            $musicModel->soloF = '/storage/' . $filePath;
                            break;
                        case 5:
                            $musicModel->high = '/storage/' . $filePath;
                            break;
                        case 6:
                            $musicModel->high2 = '/storage/' . $filePath;
                            break;
                        case 7:
                            $musicModel->highMid = '/storage/' . $filePath;
                            break;
                        case 8:
                            $musicModel->highMid2 = '/storage/' . $filePath;
                            break;
                        case 9:
                            $musicModel->lowMid = '/storage/' . $filePath;
                            break;
                        case 10:
                            $musicModel->lowMid2 = '/storage/' . $filePath;
                            break;
                        case 11:
                            $musicModel->low = '/storage/' . $filePath;
                            break;
                        case 12:
                            $musicModel->low2 = '/storage/' . $filePath;
                            break;
                        default:
                            break;
                    }
                }
                $i++;
            }
        }

        $musicTrack->update($musicModel->all());

        return back()
            ->with('success','Track edited successfully.');
//            ->with('file', $fileName);
    }

    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:music_tracks'
            ]);
        musicTrack::destroy($validated);
        session()->flash('alert', 'Product successfully deleted.');
        return redirect('repertoire');

//        $musicTrack->delete();
//
//        return redirect()->route('repertoire.index')
//            ->with('success','Track deleted successfully');
    }
}
