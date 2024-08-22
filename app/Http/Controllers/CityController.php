<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function show($id)
    {
        $city = City::findOrFail($id);

        return view('city.show', compact('city'));
    }
}
