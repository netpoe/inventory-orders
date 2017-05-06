<?php

namespace App\Http\Controllers;

use App\ModelAdapters\ProductAdapter as Product;
use App\ModelAdapters\BrandAdapter as Brand;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreProduct;
use App\Utils\CookieTool;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('name')->get();

        $response = response()->view('home', compact('products'));

        $cookie = $request->cookie('laravel_visitor_session');
        if (!$cookie) {
            $cookieTool = new CookieTool('laravel_visitor_session');
            $cookie = cookie($cookieTool->name, $cookieTool->cookieString, $cookieTool->duration);

            return $response->cookie($cookie);
        }

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('user_id', Auth::id())->get();

        return view('front/products/create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = new Product;

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->cost = $request->input('cost');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');

        $product->brand_id = $request->input('brand_id');

        $userId = Auth::id();
        $product->user_id = $userId;

        $product->save();

        $product->sku = $product->makeSku();
        $product->save();

        return redirect()->route('front:products:index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
