<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'id',
        'site_id',
        'image',
        'path',
        'extension',
        'created_at',
        'updated_at'
    ];

    public function carousel()
    {
        return $this->belongsTo(Site::class);
    }

    public function toJSONObject()
    {
        $code = null;
        if ($this->image && $this->path) {
            $url = $this->path . '/app/public/' . $this->image;
            $img = file_get_contents($url);
            $code = base64_encode($img);
        }
        return [
            'id' => $this->id,
            'site_id' => $this->site_id,
            'image' => $code,
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

    public static function getList($id)
    {
        return Carousel::orderBy('id')->where('site_id', $id)->take(3)->get();
    }

    public static function getCarousel($id)
    {
        return Carousel::where('id', $id)->get();
    }
}
