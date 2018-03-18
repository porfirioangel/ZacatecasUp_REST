<?php

namespace App\Http\Validators;

use App\ComentarioNegocio;
use Illuminate\Contracts\Validation\Rule;

class ComentarioNegocioExistente implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        $comentario = ComentarioNegocio::find($value);
        return $comentario != null;
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The :attribute must belong to an existing ComentarioNegocio';
    }
}