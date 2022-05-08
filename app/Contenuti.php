<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenuti extends Model
{
    //Model
    public $fillable = ['Raccolte_id', 'Track_id', 'Track_name', 'artista', 'album', 'UrlImg'];

    protected $primaryKey = ['Track_id', 'Raccolte_id'];

    public $incrementing = false;

    public function raccolte() {
        return $this->belongsTo(Raccolte::class);
    }
}
