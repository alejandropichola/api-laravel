<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CountryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'alpha2' => 'required|string|size:2|unique:countries',
            'alpha3' => 'nullable|string|size:3'
        ];
    }
}