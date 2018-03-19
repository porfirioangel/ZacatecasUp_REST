<?php

namespace App\Http\Validators;

use App\Negocio;
use Illuminate\Contracts\Validation\Rule;

class NegocioUnico implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        $negocio = Negocio::where('nombre', '=', $value)->get()->first();
        return $negocio == null;
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The :attribute must belong to an unique Negocio';
    }
}