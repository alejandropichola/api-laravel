<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CountryPatchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $country = $this->route('country');
        return [
            'name' => 'nullable|string',
            'alpha2' => 'nullable|string|size:2|unique:countries,alpha2,' . $country->id,
            'alpha3' => 'nullable|string|size:3'
        ];
    }
}