<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function index(Request $request)
    {
        // If a search term is present → use Scout full-text search
        if ($request->filled('search')) {
            $pets = Pet::search($request->search)->get();
        } else {
            // Otherwise load normally
            $pets = Pet::query()->get();
        }
    
        // Apply species filter after search
        if ($request->filled('species')) {
    
            // If $pets is a Collection (after Scout search), filter manually
            if ($pets instanceof \Illuminate\Support\Collection) {
                $pets = $pets->filter(function ($pet) use ($request) {
                    return $pet->species === $request->species;
                });
            } else {
                // If it's a query builder (no search), apply DB filter
                $pets = $pets->where('species', $request->species)->get();
            }
        }
    
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'vet') {
            return redirect()->route('pets.index')->with('error', 'Access denied.');
        }

        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer',
            'description' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        // Image upload → public/images
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Pet::create([
            'name' => $request->name,
            'species' => $request->species,
            'age' => $request->age,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return to_route('pets.index')->with('success', 'Pet added successfully!');
    }

    public function show(Pet $pet)
    {
        $pet->load(['appointments.user', 'owners']);
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'vet') {
            return redirect()->route('pets.index')->with('error', 'Access denied.');
        }

        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'vet') {
            return redirect()->route('pets.index')->with('error', 'Access denied.');
        }

        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer',
            'description' => 'required|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        // Handle optional image update
        if ($request->hasFile('image')) {

            // Delete old file
            if ($pet->image && file_exists(public_path('images/' . $pet->image))) {
                unlink(public_path('images/' . $pet->image));
            }

            // Save new
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $pet->image = $imageName;
        }

        $pet->update([
            'name' => $request->name,
            'species' => $request->species,
            'age' => $request->age,
            'description' => $request->description,
            'image' => $pet->image,
        ]);

        return redirect()->route('pets.show', $pet)->with('success', 'Pet updated successfully!');
    }

    public function destroy(Pet $pet)
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'vet') {
            return redirect()->route('pets.index')->with('error', 'Access denied.');
        }

        // delete image
        if ($pet->image && file_exists(public_path('images/' . $pet->image))) {
            unlink(public_path('images/' . $pet->image));
        }

        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
    }
}
