<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Suppoer\Facades\Storage;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets= Pet::all();
        return view('pets.index',compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validate input
   $request->validate([
        'name' => 'required',
        'species' => 'required',
        'age' => 'required|integer',
        'description' => 'required|max:500',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
    ]);

  // Handle image upload
if ($request->hasFile('image')) {
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $imageName);
}


    // Create the pet in the database
    Pet::create([
        'name' => $request->name,
         'species' => $request->species,
        'age' =>  $request->age,
        'description' =>  $request->description,
        'image' => $imageName,
        'created_at' =>now(),
        'updated_at' =>now()
    ]);

    // Redirect to index page with success message
    return to_route('pets.index')->with('success', 'Pet added successfully!');
}
    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
       return view('pets.show')->with('pet', $pet);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        // Return the 'pets.edit' view and pass the current pet to pre-fill the form
        return view('pets.edit')->with('pet', $pet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        // Validate input, image is optional on update
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer',
            'description' => 'required|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);
    
        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($pet->image && file_exists(public_path('images/' . $pet->image))) {
                unlink(public_path('images/' . $pet->image));
            }
            // Save new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $pet->image = $imageName;
        }
    
        // Update pet with validated data and image path
        $pet->update([
            'name' => $request->name,
            'species' => $request->species,
            'age' => $request->age,
            'description' => $request->description,
            'image' => $pet->image,
            'updated_at' => now(),
        ]);
    
        // Redirect to pets show page with success
        return redirect()->route('pets.show', $pet)->with('success', 'Pet updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
          // Redirect to pets index page with success
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
    }
}
