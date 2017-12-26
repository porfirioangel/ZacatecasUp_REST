<?php

namespace App;

use App\suscripcion;
use App\dueno_negocio;
use App\galeria_negocio;
use App\etiqueta_negocio;
use App\telefono_negocio;
use App\categoria_negocio;
use App\comentario_negocio;
use App\calificacion_negocio;
use Illuminate\Database\Eloquent\Model;

class negocio extends Model
{
    protected $filable = [
    	'nombre',
    	'latitud',
    	'longuitud',
    	'descripcion_breve',
    	'descripcion_completa',
    	'url_logo',
    	'sitio_web',
    	'facebook',
    	'categoria_negocio_id',
    	'suscripcion_id',
    ];
    /*
    ** Relaciones con otros modelos
    */
    public function duenos(){
        return $this->hasMany(dueno_negocio::class);
    }
    public function calificaciones(){
        return $this->hasMany(calificacion_negocio::class);
    }
    public function comentarios(){
        return $this->hasMany(comentario_negocio::class);
    }   
    public function etiquetas(){
        return $this->hasMany(etiqueta_negocio::class);
    }
    public function categoria(){
        return $this->belongsTo(categoria_negocio::class);
    }
    public function telefonos(){
        return $this-> hasMany(telefono_negocio::class);
    }
    public function suscripcion(){
        return $this -> belongsTo(suscripcion::class);
    }
    public function galeria(){
        return $this -> hasMany(galeria_negocio::class);
    }
}
