<?php

namespace App\Http\Requests\ApplyLoan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLoanRequest extends FormRequest
{
    /**
     * Check if the user is authorized to make this request.
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
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => [
                'numeric',
            ],
            'term' => [
                'integer',
                'min:1',
                'max:100',
            ],
            'type' => [
                Rule::in(['personal', 'vehicle', 'education']),
            ],
            'term_period' => [
                Rule::in(['mo'])
            ]
        ];
    }
}
