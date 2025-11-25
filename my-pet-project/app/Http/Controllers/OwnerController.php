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
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'vet') {
            return redirect()->route('owners.index')->with('error', 'Access denied.');
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
  if ($request->hasFile('image')) {
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $imageName);
}
   

    // Create the owner
    $owner = Owner::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'image' => $imageName,
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
        // Authorization check
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'vet') {
            return redirect()->route('owners.index')->with('error', 'Access denied.');
        }
    
        // Get all pets to display in the form
        $pets = Pet::all();
    
        // Pass both owner and pets to the view
        return view('owners.edit', compact('owner', 'pets'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        // Authorization check
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'vet') {
            return redirect()->route('owners.index')->with('error', 'Access denied.');
        }
    
        // Validate input
        $request->validate([
            'name' => 'required|string|max:25',
           // ignores the owner’s own email during validation//
            'email' => 'required|email|max:55|unique:owners,email,' . $owner->id,
            'phone_number' => 'required|string|max:15',
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
    
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->phone_number = $request->phone_number;
        $owner->save();
    
        // Sync the pets relationship if checkboxes were used
        $owner->pets()->sync($request->input('pets', []));
    
        return redirect()->route('owners.show', $owner)
                         ->with('success', 'Owner updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'vet') {
            return redirect()->route('owners.index')->with('error', 'Access denied.');
        }
        // Delete owner image if exists
        $owner->pets()->detach(); // Detach all associated pets
        $owner->delete();

        return redirect()
            ->route('owners.index')
            ->with('success', 'Owner deleted successfully!');   
    }
}
