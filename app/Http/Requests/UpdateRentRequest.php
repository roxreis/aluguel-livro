<?php

namespace App\Http\Requests;

use App\Rules\BookAlreadyRented;
use App\Rules\NotWeekendValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRentRequest extends FormRequest
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
            'user_id_fk' => 'int',
            'book_id_fk' => ['int', new BookAlreadyRented],
            'rent_start_date' => ['date', new NotWeekendValidation],
            'rent_end_date' => ['date', 'after:rent_start_date', new NotWeekendValidation]
        ];
    }
}
