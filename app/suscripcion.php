<?php

namespace App;

use App\negocio;
use Illuminate\Database\Eloquent\Model;

class suscripcion extends Model
{
    protected $filable = [
    	'tipo',
    	'fecha_inicio',
    	'fecha_fin',
    ];
    public function negocios(){
    	return $this -> hasMany(negocio::class);
    }
}
