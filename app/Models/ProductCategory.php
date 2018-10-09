<?php

namespace App;

use App\Models\Site;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'id',
        'site_id',
        'name',
        'description',
        'image',
        'extension',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    public static function getListByProductCategory(Site $site)
    {
        return ProductCategory::where('site_id', $site->id)->orderBy('name')->get();
    }
    public function toJSONObject()
    {
        $public_path = storage_path();
        $code = null;
        if ($this->image) {
            $url = $public_path . '/app/public/' . $this->image;
            $img = file_get_contents($url);
            $code = base64_encode($img);
        }
        return [
            'id' => $this->id,
            'site_id' => $this->site_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $code,
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

    public static function getList($id)
    {
        return ProductCategory::orderBy('name')->where('site_id', $id)->get();
    }
    public static function getProductCategory($id) {
        return ProductCategory::where('id', $id)->get();
    }
}
