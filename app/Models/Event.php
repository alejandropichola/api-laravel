<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    protected $fillable = [
        'id',
        'product_id',
        'image',
        'description',
        'title',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->hasMany('App\Product', 'product_id', 'id');
    }

    public function toJSONObject()
    {
        $public_path = storage_path();
        $url = $public_path.'/app/public/'.$this->image;
        $img = file_get_contents($url);
        $code = base64_encode($img);
        return [
            'id' => $this->id,
            'site_id' => $this->site_id,
            'image' => $code,
            'description' => $this->description,
            'title' => $this->title,
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
        return Event::all();
    }

    public static function getEvent($event) {
        return Event::find($event)->get();
    }
}
