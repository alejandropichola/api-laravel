<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($siteId, $productCategoryId)
    {
        $product = Product::toJSONArray(Product::getList($siteId, $productCategoryId));
        return response()->json([
            'title' => $product[0]['category'],
            'image' => $product[0]['imageCategory'],
            'data' => $product,
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
        $file_name = 'product_' . time() . '.jpg';
        $public_path = storage_path();
        list(, $file) = explode(';', $file);
        list(, $file) = explode(',', $file);
        if ($file != "") {
            \Storage::disk('public')->put($file_name, base64_decode($file));
        }
        $product = new Product();
        $product->site_id = $request->input('site_id');
        $product->product_category_id = $request->input('product_category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $file_name;
        $product->extension=$request->input('extension');
        $product->save();
        $response=response()->json([
            "data"=>$product->toJSONObject()
        ], 201);

        return json_encode($response, JSON_UNESCAPED_SLASHES);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::getProduct($id);
        $nameImg = $product[0] ? $product[0]['image'] : null;
        $public_path = storage_path();
        $url = $public_path . '/app/public/' . $nameImg;
        unlink($url);
        Product::destroy($id);
        $response = response()->json([
            "data" => 'ok'
        ], 201);
        return $response;
    }
}
