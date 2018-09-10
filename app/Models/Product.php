<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'product_category_id',
        'name',
        'description',
        'image',
        'extension',
        'created_at',
        'updated_at'
    ];
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public static function getListByProduct(ProductCategory $productCategory)
    {
        return Product::where('product_category_id', $productCategory->id)->orderBy('name')->get();
    }
    public function toJSONObject()
    {
        return [
            'id' => $this->id,
            'product_category_id' => $this->product_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
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
        return Product::orderBy('name')->get();
    }
}
