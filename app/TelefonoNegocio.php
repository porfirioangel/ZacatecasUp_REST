<?php

namespace App;

use App\Negocio;
use Illuminate\Database\Eloquent\Model;

class TelefonoNegocio extends Model
{
    protected $table = 'telefono_negocio';
    public $timestamps = false;

    protected $fillable = [
        'telefono',
        'negocio_id'
    ];

    public function negocios()
    {
        return $this->belongsTo(Negocio::class);
    }
}
