<?php

namespace App;

use App\negocio;
use App\palabra_clave;
use Illuminate\Database\Eloquent\Model;

class etiqueta_negocio extends Model
{
    protected $filable = [
    	'negocio_id',
    	'palabra_clave',
    ];
    public function negocios(){
    	return $this -> belongsTo(negocio::class);
    }
    public function palabraClave(){
    	return $this -> belongsTo(palabra_clave::class);
    }
    
}
