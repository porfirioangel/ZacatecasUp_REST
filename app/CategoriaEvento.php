<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaEvento extends Model
{
    protected $table = 'categoria_evento';
    public $timestamps = false;

    protected $fillable = [
        'categoria',
    ];

    public function negocios()
    {
        return $this->hasMany(Negocio::class);
    }
}
