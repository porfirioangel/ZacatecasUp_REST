<?php

namespace App\Http\Validators;

use App\CategoriaNegocio;
use Illuminate\Contracts\Validation\Rule;

class CategoriaNegocioExistente implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        $categoria = CategoriaNegocio::find($value);
        return $categoria != null;
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The :attribute must belong to an existing CategoriaNegocio';
    }
}