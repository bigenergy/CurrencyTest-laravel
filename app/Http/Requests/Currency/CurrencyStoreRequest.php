<?php

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'currency' => 'required|string',
            'buy' => 'required|between:0,99.99',
            'sell' => 'required|between:0,99.99',
            'begins_at_day' => 'required',
            'begins_at_time' => 'required'
        ];
    }
}
