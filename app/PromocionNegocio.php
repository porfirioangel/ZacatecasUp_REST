<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromocionNegocio extends Model
{
    protected $table = 'promocion_negocio';
    public $timestamps = false;

    protected $fillable = [
        'url_foto',
        'negocio_id',
    ];
}
