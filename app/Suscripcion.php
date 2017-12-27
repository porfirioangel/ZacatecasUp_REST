<?php

namespace App;

use App\Negocio;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $table = 'suscripcion';
    public $timestamps = false;

    protected $fillable = [
        'tipo',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function negocios()
    {
        return $this->hasMany(Negocio::class);
    }
}
