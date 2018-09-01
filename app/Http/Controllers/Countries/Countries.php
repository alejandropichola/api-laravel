<?php

namespace App\Http\Controllers\Countries;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class Countries extends Controller {
    public function getCountries () {
        $countries = Country::all();
        return $countries;
    }
}