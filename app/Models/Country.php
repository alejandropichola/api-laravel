<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'id',
        'name',
        'alpha2',
        'alpha3',
        'created_at',
        'updated_at'
    ];

    public function subDivision()
    {
        return $this->hasMany(SubDivision::class);
    }

    public function toJSONObject()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'alpha2' => $this->alpha2,
            'alpha3' => $this->alpha3,
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

    public static function getList()
    {
        return Country::orderBy('name')->get();
    }
}