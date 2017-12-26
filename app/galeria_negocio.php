<?php

namespace App;

use App\negocio;
use Illuminate\Database\Eloquent\Model;

class galeria_negocio extends Model
{
    protected $filable = [
    	'url_foto',
    	'negocio_id',
    ];
    public function negocios(){
    	return $this -> belongsTo(negocio::class);
    }
}
