<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{
    public function index()
    {
        $city    = Input::get('city');
        $country = Input::get('country');
        $zip     = Input::get('zip');

        If ($city == '' && $country == '' && $zip == '') {
            $stores = Store::all();
        } else {
            $stores = Store::where('city', 'LIKE', "%$city%")
                ->orWhere('country', 'LIKE', "%$country%")
                ->orWhere('zip', '=', "$zip")
                ->get();
        }

        return \Response::json([
            'error'  => false,
            'stores' => $stores->toArray()],
            200
        )->setCallback(Input::get('callback'));;
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

    public function store(Request $request)
    {
        $store                = new Store();
        $store->name          = Input::get('name');
        $store->address       = Input::get('address');
        $store->city          = Input::get('city');
        $store->zip           = Input::get('zip');
        $store->country       = Input::get('country');
        $store->latitude      = Input::get('latitude');
        $store->longitude     = Input::get('longitude');
        $store->support_phone = Input::get('support_phone');
        $store->support_email = Input::get('support_email');
        $store->user_id       = \Auth::user()->id;

        if ($store->save()) {
            return \Response::json([
                'error' => false,
                'msg'   => 'store created successfully.'],
                200
            )->setCallback(Input::get('callback'));
        } else {
            return \Response::json([
                'error' => true,
                'msg'   => 'issue creating store!'],
                200
            )->setCallback(Input::get('callback'));
        }
    }

    public function show($id)
    {
        $store = Store::find($id);
        return \Response::json([
            'error' => false,
            'store' => $store],
            200
        )->setCallback(Input::get('callback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $store                = Store::find($id);
        $store->name          = Input::get('name');
        $store->address       = Input::get('address');
        $store->city          = Input::get('city');
        $store->zip           = Input::get('zip');
        $store->country       = Input::get('country');
        $store->latitude      = Input::get('latitude');
        $store->longitude     = Input::get('longitude');
        $store->support_phone = Input::get('support_phone');
        $store->support_email = Input::get('support_email');
        $store->user_id       = \Auth::user()->id;

        if ($store->save()) {
            return \Response::json([
                'error' => false,
                'msg'   => 'store has been updated'],
                200
            )->setCallback(Input::get('callback'));
        } else {
            return \Response::json([
                'error' => true,
                'msg'   => 'issue updating store!'],
                200
            )->setCallback(Input::get('callback'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
