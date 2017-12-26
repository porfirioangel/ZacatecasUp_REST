<?php

namespace App;

use App\negocio;
use Illuminate\Database\Eloquent\Model;

class telefono_negocio extends Model
{
    protected $filable = [
    	'telefono',
    	'negocio_id'
    ];
    public function negocios(){
    	return $this -> belongsTo(negocio::class);
    }
}
