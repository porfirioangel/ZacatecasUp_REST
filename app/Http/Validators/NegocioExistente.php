<?php

namespace App\Http\Validators;

use App\Negocio;
use Illuminate\Contracts\Validation\Rule;

class NegocioExistente implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        $negocio = Negocio::find($value);
        return $negocio != null;
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The :attribute must belong to an existing Negocio';
    }
}