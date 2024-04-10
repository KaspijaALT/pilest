<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{


    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', ['property' => $property]);
    }
}
