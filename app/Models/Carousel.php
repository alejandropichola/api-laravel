<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'id',
        'site_id',
        'name',
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
        return [
            'id' => $this->id,
            'site_id'=>$this->site_id,
            'name' => $this->name,
            'path' => $this->path,
            'extension' => $this->extension,
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
        return Carousel::orderBy('id')->get();
    }
}
