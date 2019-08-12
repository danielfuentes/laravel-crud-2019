<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Genre extends Model
{
    protected $guarded = [];

    public function movies(){
        return $this->hasMany(Movie::class);
    }
}
