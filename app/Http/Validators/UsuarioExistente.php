<?php

namespace App\Http\Validators;

use App\Usuario;
use Illuminate\Contracts\Validation\Rule;

class UsuarioExistente implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        $usuario = Usuario::find($value);
        return $usuario != null;
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The :attribute must belong to an existing Usuario';
    }
}