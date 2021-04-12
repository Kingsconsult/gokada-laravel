<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();

        $addressArray = array();

        foreach($addresses as $address) {
            array_push($addressArray, $address->address);
        }


        return response()->json($addressArray); 
    }

    public function store(Request $request)
    {
        

        $address = new Address;
        $address->address = $request->address;
        $address->save();

        return response()->json([
            "message" => "address added",
            "address" => $address
        ], 201);
    }
}
