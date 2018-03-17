<?php

namespace App\Http\Validators;

use App\CategoriaNegocio;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CategoriaNegocioUnica implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        $categoria = DB::table('categoria_negocio')
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
        return 'The :attribute must be unique';
    }
}