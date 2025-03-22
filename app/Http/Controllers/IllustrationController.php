<?php

namespace App\Http\Controllers;

use App\Models\Illustration;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Validator;

class IllustrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $illustrations = Illustration::with('arts')->get();
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
        ]);
        
        $illustration = auth()->user()->illustrations()->create($validated);

        $img_count = count(request('image'));
        $valcon = [];

        // Create an array containing validator condition
        for($i=0; $i<$img_count; $i++)
        {$valcon[$i] = ['required', 'image'];}
        
        // Validate the image one by one, each matching the previously established array of condition
        $img_validator = Validator::make(request('image'), $valcon);
        if($img_validator->fails()){
            return redirect(route('illustration.create'))->withErrors($img_validator);
            //with errors later
        }
        
        // Store the images
        for($i=0; $i<$img_count; $i++)
        {
            $img_path = request('image')[$i]->store('arts', 'public');

            $image = Image::read(public_path("storage/$img_path"));
            $image->scale(400, 400);
            $image->save();

            $illustration->arts()->create(['image'=>$img_path]);
        }

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
