<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{

    public function index()
    {
        return response()->json([
            '' => Product::get()
        ]);
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;

        $product->save();

        return response()->json([
            'message' => 'success',
            'status' => '200',
            'data' => $product,
        ]);
    }

    public function show(Product $product)
    {
        return response()->json(['post' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->title;
        $product->description = $request->description;

        $product->save();

        return response()->json([
            'message' => 'изменено',
            'status' => '200',
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'удалено',
            'status' => '200',
        ]);
    }
}
