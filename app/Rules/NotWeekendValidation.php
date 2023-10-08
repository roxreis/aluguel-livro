<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotWeekendValidation implements Rule
{
    public function passes($attribute, $value)
    {
        // Verifica se o dia da semana não é sábado (6) nem domingo (0).
        return !in_array(date('w', strtotime($value)), [0, 6]);
    }

    public function message()
    {
        return 'The date cannot be a weekend (Saturday or Sunday).';
    }
}
