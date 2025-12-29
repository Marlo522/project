<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $year = (int) date('Y');

        return [
            'name'           => ['required','string','max:255'],
            'author'         => ['required','string','max:255'],
            'published_year' => ['required','integer','min:0',"max:$year"],
            'genre'          => ['required','string','max:100'],
            'quantity'       => ['required','integer','min:0'],
        ];
    }
}