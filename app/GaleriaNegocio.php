<?php

namespace App;

use App\Negocio;
use Illuminate\Database\Eloquent\Model;

class GaleriaNegocio extends Model
{
    protected $table = 'galeria_negocio';
    public $timestamps = false;

    protected $fillable = [
        'url_foto',
        'negocio_id',
    ];

    public function negocios()
    {
        return $this->belongsTo(Negocio::class);
    }
}
