<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $destination = DB::table('ideas')
            ->select('destination')
            ->distinct()
            ->pluck('destination'); // Retrieve the distinct destination values from the 'ideas' table


        return view('map', ['destination' => $destination]); // Pass the destination values to the 'map' view
    }

}
