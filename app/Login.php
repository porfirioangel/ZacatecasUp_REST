<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';
    public $timestamps = false;

    protected $fillable = [
        'token',
        'fecha_login',
        'fecha_expiracion'
    ];
}
