<?php

namespace App\Http\Controllers;

use App\ModelAdapters\ProductsCartAdapter as ProductsCart;
use App\ModelAdapters\LuProductsCartStatusAdapter as LuProductsCartStatus;
use App\ModelAdapters\ProductAdapter as Product;
use App\ModelAdapters\UserAddressAdapter as UserAddress;
use App\ModelAdapters\UserAdapter as User;
use App\ModelAdapters\LuUserRoleAdapter as LuUserRole;
use App\ModelAdapters\LuAddressCountryAdapter as LuAddressCountry;
use App\ModelAdapters\LuAddressStateAdapter as LuAddressState;
use Illuminate\Http\Request;
use Auth;
use App\Utils\CookieTool;
use App\Utils\StringTool;
use App\Http\Requests\StoreProductsCartAmount;

class ProductsCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cookie = $request->cookie('laravel_visitor_session');

        $productsCart = new ProductsCart;
        $products = $productsCart->getProductsInSession($cookie);

        return view('front/products_cart/index', compact('products'));
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
        $cookie = $request->cookie('laravel_visitor_session');

        // TODO if cookie does not exist, create it and redirect

        $cart = new ProductsCart;

        $productExistsInCart = !$cart
            ->where('session', $cookie)
            ->where('product_id', $product->id)
            ->get()->isEmpty();
        if ($productExistsInCart) {
            return redirect()->route('cart:index');
        }

        $cart->product_id = $product->id;
        $cart->session = $cookie;
        $cart->user_id = Auth::id();
        $cart->status_id = LuProductsCartStatus::IN_SESSION;

        $cart->save();

        return redirect()->route('cart:index');
    }

    /*
     * setProductsAmount
     *
     * Method will update the products_cart.product_amount field according to the user selection
     * Restrictions include if the input product_amount is greater than product.stock value, the update should not do
     *
     * @param Request
     *
     * @return redirect to cart:shipping
     * */
    public function setProductsAmount(StoreProductsCartAmount $request)
    {
        $cookie = $request->cookie('laravel_visitor_session');
        // TODO if cookie does not exist, create it and redirect

        $cart = new ProductsCart;
        $cart->setProductsAmount($cookie, $request->input('product.id'));

        return redirect()->route('front:orders:confirmation');
    }

    public function shipping()
    {
        $countries = LuAddressCountry::where('is_active', 1)->get();
        $states = LuAddressState::where('is_active', 1)->get();

        $params = compact('countries', 'states');
        return view('front/products_cart/shipping', $params);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('cart:shipping');
        }

        // TODO display a flash message about an authentication failure
        return redirect()->route('cart:shipping');
    }

    public function setShippingAddress(Request $request)
    {
        $email = $request->input('email');
        $password = StringTool::getRandomString(12);
        if (!Auth::check()) {
            User::create([
                'email' => $email,
                'mobile_number' => $request->input('mobile_number'),
                'name' => $request->input('name'),
                'paternal_last_name' => $request->input('paternal_last_name'),
                'maternal_last_name' => $request->input('maternal_last_name'),
                'password' => bcrypt($password),
                'role_id' => LuUserRole::CLIENT,
            ]);
            if (!Auth::attempt(['email' => $email, 'password' => $password])) {
                throw new Exception('No hemos podido guardar tus datos');
            }
        }

        $userAddress = new UserAddress;

        $userAddress->user_id = Auth::id();
        $userAddress->zip_code = $request->input('zip_code');
        $userAddress->country_id = $request->input('country_id');
        $userAddress->state_id = $request->input('state_id');
        $userAddress->city = $request->input('city');
        $userAddress->street = $request->input('street');
        $userAddress->neighborhood = $request->input('neighborhood');
        $userAddress->interior = $request->input('interior');

        $userAddress->save();

        return redirect()->route('cart:set-payment');
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
