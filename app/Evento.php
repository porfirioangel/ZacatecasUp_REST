<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'latitud',
        'longuitud',
        'descripcion',
        'costo',
        'url_flyer',
        'categoria_evento_id',
    ];
}
