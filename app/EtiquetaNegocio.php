<?php

namespace App;

use App\Negocio;
use App\PalabraClave;
use Illuminate\Database\Eloquent\Model;

class EtiquetaNegocio extends Model
{
    protected $table = 'etiqueta_negocio';
    public $timestamps = false;

    protected $fillable = [
        'negocio_id',
        'palabra_clave_id',
    ];

    public function negocios()
    {
        return $this->belongsTo(Negocio::class);
    }

    public function palabraClave()
    {
        return $this->belongsTo(PalabraClave::class);
    }

}
