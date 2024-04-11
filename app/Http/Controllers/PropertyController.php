<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{


    public function show(Property $property_ID)
{
    return view('properties.show', ['property' => $property_ID]);
}

}
