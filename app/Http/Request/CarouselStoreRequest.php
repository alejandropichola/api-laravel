<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CarouselStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'site_id' => 'require',
            'name' => 'required|string',
            'path' => 'required|string',
            'extension' => 'require'
        ];
    }
}