<?php

namespace App;

use App\Negocio;
use Illuminate\Database\Eloquent\Model;

class CategoriaNegocio extends Model
{
    protected $table = 'categoria_negocio';
    public $timestamps = false;

	protected $fillable=[
		'categoria',
	];

	public function negocios(){
		return $this -> hasMany(Negocio::class);
	}
 
}
