<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get all owners//
        $owners = Owner::all();
        //return view with owner page
        return view('owners.index',compact('owners'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin'){
            return redirect()->route('owners.index')->with('error','Access denied.');
        }
        //loads the create view//
        $pets = Pet ::all();
        return view('owners.create', compact ('pets'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:25',
        'email' => 'required|email|max:55|unique:owners,email',
        'phone_number' => 'required|string|max:15',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        'pets' => 'array' // Validate pets as an array//
    ]);

    // Handle image upload
    $imagePath = $request->file('image')->store('owners', 'public');

    // Create the owner
    $owner = Owner::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'image' => $imagePath,
    ]);
       // Attach selected pets (many-to-many)
       if ($request->pets) {
        $owner->pets()->attach($request->pets);
    }

    return redirect()
        ->route('owners.show', $owner)
        ->with('success', 'Owner created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        //load the pets relationship//
         $owner->load('pets'); 
         //passing the owner (with pets) to the view//
         return view('owners.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
          //checks if user is the owner or an admin//
        if(auth()->id() !== $owner->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('owners.show')->with('error', 'Access denied.');
        }
        $pets = Pet::all(); // get all pets
        //passing the pet and review object to the views//
        return view('owners.edit',compact('owner'));
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
           // Validate input
    $owner = $request->validate([
        'name' => 'required|string|max:25',
        'email' => 'required|email|max:55|unique:owners,email',
        'phone_number' => 'required|string|max:15',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        'pets' => 'array' // Validate pets as an array//
    ]);

    $owner->update($validated);

   // Update owner fields
   $owner->update([
    'name' => $request->name,
    'email' => $request->email,
    'phone_number' => $request->phone_number,
    'image' => $owner->image, // either old or new image
]);

// Sync pets (many-to-many)
$owner->pets()->sync($request->pets ?? []);

// Redirect back to owner show page with success
return redirect()->route('owners.show', $owner)
                 ->with('success', 'Owner updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->pets()->detach(); // Detach all associated pets
        $owner->delete();

        return redirect()
            ->route('owners.index')
            ->with('success', 'Owner deleted successfully!');   
    }
}
