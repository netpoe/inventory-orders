<?php

namespace App\Http\Controllers;

use App\ModelAdapters\ProductsCartAdapter as ProductsCart;
use App\ModelAdapters\LuProductsCartStatusAdapter as LuProductsCartStatus;
use App\ModelAdapters\ProductAdapter as Product;
use Illuminate\Http\Request;
use Auth;

class ProductsCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cookie = $request->cookie('laravel_session');

        $productsInCart = ProductsCart::where('session', $cookie)->get()->pluck('product_id');
        $products = Product::whereIn('id', $productsInCart)->get();

        return view('products_cart/index', compact('products'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $cookie = $request->cookie('laravel_session');

        $cart = new ProductsCart;

        // TODO check if the product already exists for the session
        if (!$cart->where('session', $cookie)->get()->isEmpty()) {
            return redirect()->route('cart:index');
        }

        $cart->product_id = $product->id;
        $cart->session = $cookie;
        $cart->user_id = Auth::user()->id;
        $cart->status_id = LuProductsCartStatus::IN_SESSION;

        $cart->save();

        return redirect()->route('cart:index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductsCart  $productsCart
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsCart $productsCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductsCart  $productsCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsCart $productsCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductsCart  $productsCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductsCart $productsCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductsCart  $productsCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsCart $productsCart)
    {
        //
    }
}
