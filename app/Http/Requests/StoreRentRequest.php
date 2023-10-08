<?php

namespace App\Http\Requests;

use App\Rules\BookAlreadyRented;
use App\Rules\NotWeekendValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreRentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id_fk' => 'required|int',
            'book_id_fk' => ['required', 'int', new BookAlreadyRented ],
            'rent_start_date' => ['required', 'date', new NotWeekendValidation],
            'rent_end_date' => ['required', 'date', 'after:rent_start_date', new NotWeekendValidation]
        ];
    }
}
