<?php

namespace App;

use App\Suscripcion;
use App\DuenoNegocio;
use App\GaleriaNegocio;
use App\EtiquetaNegocio;
use App\TelefonoNegocio;
use App\CategoriaNegocio;
use App\ComentarioNegocio;
use App\CalificacionNegocio;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    protected $table = 'negocio';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'descripcion_breve',
        'descripcion_completa',
        'url_logo',
        'sitio_web',
        'facebook',
        'categoria_negocio_id',
        'suscripcion_id',
    ];

    public function duenos()
    {
        return $this->hasMany(DuenoNegocio::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(CalificacionNegocio::class);
    }

    public function comentarios()
    {
        return $this->hasMany(ComentarioNegocio::class);
    }

    public function etiquetas()
    {
        return $this->hasMany(EtiquetaNegocio::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaNegocio::class);
    }

    public function suscripcion()
    {
        return $this->belongsTo(Suscripcion::class);
    }

    public function galeria()
    {
        return $this->hasMany(GaleriaNegocio::class);
    }
}
