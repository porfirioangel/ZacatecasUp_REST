<?php

namespace App;

use App\Negocio;
use App\usuario;
use Illuminate\Database\Eloquent\Model;

class ComentarioNegocio extends Model
{
    protected $table = 'comentario_negocio';
    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'negocio_id',
        'comentario',
        'fecha',
    ];

    public function negocios()
    {
        return $this->belongsTo(Negocio::class);
    }

    public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }

}
