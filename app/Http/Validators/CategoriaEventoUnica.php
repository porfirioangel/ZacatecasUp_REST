<?php

namespace App\Http\Validators;

use App\CategoriaEvento;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CategoriaEventoUnica implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        $categoria = DB::table('categoria_evento')
            ->select('categoria')
            ->where('categoria', '=', $value)
            ->first();

        return $categoria == null;
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The :attribute of CategoriaEvento must be unique';
    }
}