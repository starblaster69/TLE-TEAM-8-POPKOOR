<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class musicTrack extends Model
{
    use HasFactory;

    protected $fillable = [
//      information
        'title',
        'artist',
        'lyrics',
        'translation',
        'choralDirection',
        'sheetMusic',

//      audio files (probably make this a sub-table?)
        'full',
        'instrumental',
        'solo',
        'soloM',
        'soloF',
        'high',
        'high2',
        'highMid',
        'highMid2',
        'lowMid',
        'lowMid2',
        'low',
        'low2',
    ];
}
