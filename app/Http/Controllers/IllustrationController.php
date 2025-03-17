<?php

namespace App\Http\Controllers;

use App\Models\Illustration;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Intervention\Image\Laravel\Facades\Image;

class IllustrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $illustrations = Illustration::all();
        return Inertia::render('Illustration/Illustration', ['illustrations'=>$illustrations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Illustration/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required','string'],
            'caption' => ['string'],
            'image' => ['required', 'image'],
        ]);
        
        $img_path = request('image')->store('illustrations', 'public');

        $image = Image::read(public_path("storage/$img_path"));
        $image->scale(400, 400);
        $image->save();

        $validated['image'] = $img_path;

        auth()->user()->illustrations()->create($validated);
        
        return redirect(route('illustration.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Illustration $illustration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Illustration $illustration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Illustration $illustration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Illustration $illustration)
    {
        //
    }
}
