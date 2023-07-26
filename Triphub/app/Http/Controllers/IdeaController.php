<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\IdeasComment;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::all();
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ideaTitle' => 'required|max:255',
            'description' => 'required',
        ]);

        Idea::create($validated);
        return redirect()->route('ideas.index')->with('success', 'Idea created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $idea = Idea::findOrFail($id);
        return view('ideas.show', compact('idea'));
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
     * Update the accommodation of an idea.
     */
    public function updateAccommodation(Request $request, Idea $idea, Accommodation $accommodation)
    {
        $idea->accommodation_id = $accommodation->id;
        $idea->save();
        return redirect()->route('ideas.show', compact('idea'))->with('success', 'Accommodation updated to idea');
    }

    public function addComment(Request $request, Idea $idea)
    {
        // Data validation

        $validator = Validator::make($request->all(), [
            'commentInput' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $ideasComment = new IdeasComment();
        $ideasComment->content = $request->commentInput;
        $validatedData = $request->validate([
            'commentInput' => 'required',
        ]);
        $ideasComment->date = date('Y-m-d');
        $ideasComment->user_id = 1;
        $ideasComment->idea_id = $idea->id;
        $ideasComment->save();

        return redirect()->route('ideas.show', compact('idea'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
