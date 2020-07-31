<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = "artists";
    protected $primaryKey = "ArtisId";
    public $timestamps = false;
}
