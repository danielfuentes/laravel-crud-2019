<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;

class Movie extends Model
{
    //protected $table = 'movies';
    //protected $primaryKey = 'id';
    //protected $timeStamps = true;
    protected $guarded = [];

    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}

