<?php

namespace App\Rules;

use App\Models\Book;
use Illuminate\Contracts\Validation\Rule;

class BookAlreadyRented implements Rule
{
    public function passes($attribute, $value)
    {
        return Book::where('id', $value)->count() === 0;
    }

    public function message()
    {
        return 'This Book is already rented.';
    }
}
