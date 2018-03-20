<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'fecha',
        'latitud',
        'longitud',
        'costo',
        'url_flyer',
        'categoria_evento_id',
    ];
}
