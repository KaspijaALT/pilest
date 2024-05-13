<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{

    public function index()
    {
        $properties = Property::all(); // Change this line
        return view('properties.show', compact('properties'));
    }


    public function show(Property $property)
    {
        // Immediately dump the property that's resolved by route model binding
        //dd($property);

        // Assuming you have set up the relationship in your Property model as mentioned earlier,
        // let's try to eager load the pictures and dump the result
        $property = Property::with('pictures')->findOrFail($property->property_ID);

        // If everything looks correct up to this point, continue to return the view
        return view('properties.show', compact('property'));
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

    public function favorites()
    {
        $user = Auth::user(); // Get the authenticated user

        // Decode the liked properties JSON array into PHP array
        $likedProperties = json_decode($user->liked_properties, true) ?? [];

        // Retrieve the properties that are in the liked properties list
        $properties = Property::whereIn('id', $likedProperties)->get();

        // Pass the properties to the view
        return view('properties.favorites', compact('properties'));
    }

    public function like(Request $request, $propertyId)
    {
        $user = Auth::user();
        // Retrieve the existing likes from the user model
        $likedProperties = json_decode($user->liked_properties, true) ?? [];

        // Check if the property is already liked
        if (!in_array($propertyId, $likedProperties)) {
            // Add the property ID to the liked properties array
            $likedProperties[] = $propertyId;
            // Save the updated array back to the user
            $user->liked_properties = json_encode($likedProperties);
            $user->save();

            // Return back with a success message
            return back()->with('success', 'Property liked successfully.');
        } else {
            // Return back with a message that it's already liked
            return back()->with('info', 'You have already liked this property.');
        }
    }
}
