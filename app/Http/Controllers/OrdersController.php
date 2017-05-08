<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAdapters\ProductsCartAdapter as ProductsCart;
use App\ModelAdapters\ProductAdapter as Product;
use App\ModelAdapters\OrderAdapter as Order;
use App\ModelAdapters\LuOrderStatusAdapter as LuOrderStatus;
use Auth;
use App\Http\Requests\StoreProductsCartAmount;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $orders = Order::where('user_id', $userId)->get();

        return view('front/orders/index', compact('orders'));
    }

    public function confirmation(Request $request, Order $order)
    {
        if ($order->status_id == LuOrderStatus::PENDING) {
            $cart = $order->getCart();
            $address = $order->address;
            $order->calcTotals();

            $params = compact('cart', 'order', 'address');

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

    /*
     * store
     *
     * Method will update the products_cart.amount field according to the user selection
     * Restrictions include if the input amount is greater than product.stock value, the update should not do
     *
     * @param Request
     *
     * @return redirect to cart:shipping
     * */
    public function store(StoreProductsCartAmount $request)
    {
        $session = $request->cookie('laravel_visitor_session');
        // TODO if cookie does not exist, create it and redirect

        $cart = new ProductsCart;
        $cart->setProductsAmount($session, $request->input('product.id'));

        $order = Order::where('products_cart_session', $session)->first();
        if ($order) {
            return redirect()->route('shipping:index', ['order' => $order->id]);
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'products_cart_session' => $session,
            'status_id' => LuOrderStatus::PENDING,
        ]);

        return redirect()->route('shipping:index', ['order' => $order->id]);
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
        $order->calcTotals()->save();

        // TODO perform payment and update stock
        // If payment fails, the stock should not be updated and should display payment failure notice
        $order->updateProductsStock();

        return redirect()->route('front:orders:index');
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
