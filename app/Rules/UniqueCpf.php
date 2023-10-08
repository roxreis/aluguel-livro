<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UniqueCpf implements Rule
{
    public function passes($attribute, $value)
    {
        return User::where('cpf', $value)->count() === 0;
    }

    public function message()
    {
        return 'This CPF is already associated with a user.';
    }
}
