<?php

namespace App;

use App\DuenoNegocio;
use App\ComentarioNegocio;
use App\CalificacionNegocio;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    public $timestamps = false;

    public function dueno()
    {
        return $this->hasMany(DuenoNegocio::class);
    }

    public function calificacion()
    {
        return $this->hasMany(CalificacionNegocio::class);
    }

    public function comentario()
    {
        return $this->hasMany(ComentarioNegocio::class);
    }

}
