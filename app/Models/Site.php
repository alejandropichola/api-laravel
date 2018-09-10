<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];
    public function site()
    {
        return $this->hasMany(Carousel::class);
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

    public static function getList()
    {
        return Site::orderBy('id')->get();
    }
}
