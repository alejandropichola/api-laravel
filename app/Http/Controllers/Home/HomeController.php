<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $url = $request->fullUrl();
        $countries = $url.'/countries';
        $links = array(
            'data' => array(
                'url'=> array(
                    'countries' => $countries
                )
            )
        );
        $json = json_encode($links, JSON_UNESCAPED_SLASHES);
         return ($json);
    }

}
