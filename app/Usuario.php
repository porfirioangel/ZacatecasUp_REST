<?php

namespace App;

use App\dueno_negocio;
use App\comentario_negocio;
use App\calificacion_negocio;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    public $timestamps = false;
    
    public function dueno(){
    	return $this->hasMany(dueno_negocio::class);
    }
    public function calificacion(){
    	return $this->hasMany(calificacion_negocio::class);
    }
    public function comentario(){
    	return $this->hasMany(comentario_negocio::class);
    }

}
