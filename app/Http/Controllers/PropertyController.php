<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function show($property_id)
    {
        // Fetch the property from the database by ID
        $property = Property::findOrFail($property_id);

        // Return the show.blade.php view with the property data
        return view('properties.show', ['property' => $property]);
    }
    public function search(Request $request)
    {
        // Start the query
        $query = Property::query();

        // Apply filters
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }
        if ($request->filled('type')) {
            $query->where('Property_type', $request->type);
        }
        if ($request->filled('parking')) {
            $query->where('Nearby_parking', $request->parking);
        }
        if ($request->filled('min_area')) {
            $query->where('area', '>=', $request->min_area);
        }
        if ($request->filled('max_area')) {
            $query->where('area', '<=', $request->max_area);
        }
        if ($request->filled('min_price')) {
            $query->where('Price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('Price', '<=', $request->max_price);
        }

        // Execute the query and get the results
        $properties = $query->get();

        // Return a view and pass the retrieved properties to it
        return view('properties.results', compact('properties'));
    }
}
