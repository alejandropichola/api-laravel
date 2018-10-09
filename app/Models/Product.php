<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'site_id',
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

    public static function toJSONObject($object=[])
    {
        $json=json_decode( json_encode( $object ), true );
        $public_path = storage_path();
        $code = null;
        $codeCategory = null;
        $image = $json['image'];
        $imageCategory = $json['imageCategory'];
        if ($image) {
            $url = $public_path . '/app/public/' . $image;
            $img = file_get_contents($url);
            $code = base64_encode($img);
        }
        if ($imageCategory) {
            $url = $public_path . '/app/public/' . $imageCategory;
            $img = file_get_contents($url);
            $codeCategory = base64_encode($img);
        }
        return [
            'id' => $json['id'],
            'category' => $json['category'],
            'site_id' => $json['site_id'],
            'product_category_id' => $json['product_category_id'],
            'imageCategory' => $codeCategory,
            'name' => $json['name'],
            'description' => $json['description'],
            'image' => $code,
            'extension' => $json['extension'],
            'created_at' => date('c', strtotime($json['created_at'])),
            'updated_at' => date('c', strtotime($json['updated_at']))
        ];
    }

    public static function toJSONArray($list = [])
    {
        $response = [];
        foreach ($list as $item) array_push($response, Product::toJSONObject($item));
        return $response;
    }

    public static function getList($id, $product)
    {
        return DB::select('SELECT t1.name as category, t1.image as imageCategory, t2.* FROM product_categories as t1 LEFT JOIN products AS t2 on t1.id=t2.product_category_id WHERE t1.id=:id and t1.site_id=:site ORDER BY t2.created_at ASC', ['site'=>$id, 'id'=>$product]);
    }
    public static function getProduct($id) {
        return Product::where('id', $id)->get();
    }
}
