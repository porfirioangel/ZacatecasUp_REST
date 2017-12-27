<?php

namespace App;

use App\EtiquetaNegocio;
use Illuminate\Database\Eloquent\Model;

class PalabraClave extends Model
{
    protected $table = 'palabra_clave';
    public $timestamps = false;

    protected $fillable = [
        'keyword',
    ];

    public function etiqueta()
    {
        return $this->hasMany(EtiquetaNegocio::class);
    }
}
