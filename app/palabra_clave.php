<?php

namespace App;

use App\etiqueta_negocio;
use Illuminate\Database\Eloquent\Model;

class palabra_clave extends Model
{
    protected $filable = [
    	'keyword',
    ];
    public function etiqueta(){
    	return $this->hasMany(etiqueta_negocio::class);

    }
}
