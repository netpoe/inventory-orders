<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAdapters\ProductsCartAdapter as ProductsCart;
use App\ModelAdapters\ProductAdapter as Product;
use App\ModelAdapters\OrderAdapter as Order;
use App\ModelAdapters\LuOrderStatusAdapter as LuOrderStatus;
use Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front/orders/index');
    }

    public function confirmation(Request $request, Order $order)
    {
        if ($order->status_id == LuOrderStatus::PENDING) {
            $products = $order->getProducts();
            $address = $order->address;
            $order->calcTotals();

            $params = compact('products', 'order', 'address');

            return view('front/orders/confirmation', $params);
        }

        return redirect()->route('front:orders:index');
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
    public function store(Request $request, Order $order)
    {
        $order->calcTotals()->save();

        // TODO perform payment and update stock
        // If payment fails, the stock should not be updated and should display payment failure notice
        $order->updateProductsStock();

        return redirect()->route('front:orders:index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
