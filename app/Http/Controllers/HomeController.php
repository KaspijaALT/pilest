<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Property;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            $properties = Property::all(); // Fetch all properties

            if ($usertype == 'user') {
                // Pass properties to the user dashboard view
                return view('dashboard', compact('properties'));
            } else if ($usertype == 'admin') {
                // Assuming admins also need to see properties, pass them to the admin view
                // Adjust this part if admins don't need to see properties
                return view('admin.adminhome', compact('properties'));
            } else {
                // Redirect back if the user type doesn't match 'user' or 'admin'
                return redirect()->back();
            }
        } else {
            // Redirect to login page if the user is not authenticated
            // Adjust the redirection path as needed
            return redirect()->route('login');
        }
    }
}
