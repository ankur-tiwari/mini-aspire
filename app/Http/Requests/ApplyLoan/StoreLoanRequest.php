<?php

namespace App\Http\Requests\ApplyLoan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLoanRequest extends FormRequest
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
                'required',
                'numeric'
            ],
            'term' => [
                'required',
                'integer',
                'min:1',
                'max:100'
            ],
            'type' => [
                'required',
                Rule::in(['personal', 'vehicle', 'education']),
            ],
            'term_period' => [
                'required',
                Rule::in(['mo'])
            ]
        ];
    }

    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated($key, $default), [
            'user_id' => $this->user()->id
        ]);
    }
}
