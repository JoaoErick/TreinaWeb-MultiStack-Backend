<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Services\ViaCEP;

class ValidaCep implements Rule
{
    protected ViaCEP $viaCep;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        ViaCEP $viaCep
    ) {
        $this->viaCep = $viaCep;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cep =  str_replace('-', '', $value);

        return !! $this->viaCep->buscar($cep);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'CEP inválido!';
    }
}
