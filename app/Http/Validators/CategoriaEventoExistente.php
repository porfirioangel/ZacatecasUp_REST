<?php

namespace App\Http\Validators;

use App\CategoriaEvento;
use Illuminate\Contracts\Validation\Rule;

class CategoriaEventoExistente implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        $categoria = CategoriaEvento::find($value);
        return $categoria != null;
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The :attribute must belong to an existing CategoriaEvento';
    }
}