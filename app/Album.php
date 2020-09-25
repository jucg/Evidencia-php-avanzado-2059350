<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table="Albums";
    protected $primaryKey = "AlbumId";
    public $timestamps = false;

    //Relacion Artita - Ambunes
    //Relacion uno a muchos 1 - m: utilizando hasMany: metodo Eloquent
    public function albumes(){
        return $this -> hasMany('App\Album', 'ArtistId');
    }



}
