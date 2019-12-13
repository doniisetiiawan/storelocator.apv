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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
