<?php

namespace App;

use App\negocio;
use App\usuario;
use Illuminate\Database\Eloquent\Model;

class dueno_negocio extends Model
{
    protected $filable = [
    	'usuario_id',
    	'negocio_id',
    ];
    public function negocios(){
    	return $this -> belongsTo(negocio::class);
    }
    public function usuario(){
    	return $this -> belongsTo(usuario::class);
    }
}
