<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\StringTool;
use Auth;
use App\ModelAdapters\UserAdapter as User;
use App\ModelAdapters\LuUserRoleAdapter as LuUserRole;
use App\ModelAdapters\UserAddressAdapter as UserAddress;
use App\ModelAdapters\OrderAdapter as Order;
use App\ModelAdapters\LuAddressCountryAdapter as LuAddressCountry;
use App\ModelAdapters\LuAddressStateAdapter as LuAddressState;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Order $order)
    {
        $countries = LuAddressCountry::where('is_active', 1)->get();
        $states = LuAddressState::where('is_active', 1)->get();

        $params = compact('countries', 'states');
        $params['orderId'] = $order->id;

        if (Auth::check()) {
            $user = Auth::user();
            $addresses = $user->addresses;
            $params['addresses'] = $addresses;
        }

        return view('front/shipping/index', $params);
    }

    public function login(Request $request, Order $order)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('shipping:index', ['order' => $order->id]);
        }

        // TODO display a flash message about an authentication failure
        return redirect()->route('shipping:index', ['order' => $order->id]);
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

        $order->address_id = $userAddress->id;
        $order->save();

        return redirect()->route('front:orders:confirmation', ['order' => $order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Order $order)
    {
        $countries = LuAddressCountry::where('is_active', 1)->get();
        $states = LuAddressState::where('is_active', 1)->get();

        $user = Auth::user();
        $addresses = $user->addresses;

        $params = compact('countries', 'states', 'addresses');

        $params['orderId'] = $order->id;
        $params['addressId'] = $order->address_id;

        return view('front/shipping/edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $addressId = $request->input('address_id');
        $userAddress = UserAddress::find($addressId);

        $order->address_id = $userAddress->id;
        $order->save();

        return redirect()->route('front:orders:confirmation', ['order' => $order->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
