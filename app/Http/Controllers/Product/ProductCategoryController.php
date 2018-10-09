<?php

namespace App\Http\Controllers\Product;

use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($siteId)
    {
        $productCategory = ProductCategory::toJSONArray(ProductCategory::getList($siteId));
        return response()->json([
            'data' => $productCategory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->input('image');
        $file_name = 'product_category_' . time() . '.jpg';
        $public_path = storage_path();
        list(, $file) = explode(';', $file);
        list(, $file) = explode(',', $file);
        if ($file != "") {
            \Storage::disk('public')->put($file_name, base64_decode($file));
        }
        $productCategory = new ProductCategory();
        $productCategory->site_id = $request->input('site_id');
        $productCategory->name = $request->input('name');
        $productCategory->description = $request->input('description');
        $productCategory->image = $file_name;
        $productCategory->extension = $request->input('extension');
        $productCategory->save();
        $response = response()->json([
            "data" => $productCategory->toJSONObject()
        ], 201);
        return json_encode($response, JSON_UNESCAPED_SLASHES);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCategory = ProductCategory::getProductCategory($id);
        $nameImg = $productCategory[0] ? $productCategory[0]['image'] : null;
        $public_path = storage_path();
        $url = $public_path . '/app/public/' . $nameImg;
        unlink($url);
        ProductCategory::destroy($id);
        $response = response()->json([
            "data" => 'ok'
        ], 201);
        return $response;
    }
}
