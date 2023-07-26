<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function show(Request $request)
    {
        // Retrieve the destination parameter from the request 
        $destination = $request->input('destination');

        // Retrieve the related information from the database based on the destination parameter
        $ideas = Idea::select('content')->where('destination', $destination)->get();

        // Return the related information as a JSON response
        return response()->json($ideas);
    }
}
