<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
    protected $fillable = [
        'id',
        'country_id',
        'name',
        'created_at',
        'updated_at'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public static function getListByCountry(Country $country)
    {
        return Subdivision::where('country_id', $country->id)->orderBy('name')->get();
    }

    public function toJSONObject()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at->format('c'),
            'updated_at' => $this->updated_at->format('c')
        ];
    }

    public static function toJSONArray($list = [])
    {
        $response = [];

        foreach ($list as $item) array_push($response, $item->toJSONObject());

        return $response;
    }

}