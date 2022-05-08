<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raccolte extends Model
{
    //Model
    protected $fillable = ['Titolo', 'UrlImg', 'User_id'];

    //Controllo contenuti, tante raccolte quanti tanti contenuti N-N
    public function contenuti() {
        return $this->hasMany(Contenuti::class);
    }
}
