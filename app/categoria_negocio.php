<?php

namespace App;

use App\negocio;
use Illuminate\Database\Eloquent\Model;

class categoria_negocio extends Model
{
	protected $filable=[
		'categoria',
		'ionicon',
	];
	public function negocios(){
		return $this -> hasMany(negocio::class);
	}
 
}
