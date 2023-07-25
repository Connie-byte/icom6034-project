<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{

    public function searchIdea(string $destination)
    {
        echo("fffffffff");
        return redirect()->route('ideas.show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $destination = DB::table('ideas')
            ->select('destination')
            ->distinct()
            ->pluck('destination'); // Retrieve the distinct destination values from the 'ideas' table
        return view('map', ['destination' => $destination]); // Pass the destination values to the 'map' view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
