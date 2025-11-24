<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Pet;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

     public function store(Request $request, Pet $pet)
{

      // Vet only
      if (auth()->user()->role !== 'vet') {
        return redirect()->back()->with('error', 'Only vets can create appointments.');
    }
    // Validate input
    $request->validate([
        'appointment_type' => 'nullable|in:checkup,vaccination,surgery,grooming',
        'vet_name' => 'required|string|max:25',
        'clinic_name' => 'required|string|max:55',
        'appointment_date' => 'required|date|after_or_equal:today',
        'vet_notes' => 'nullable|string|max:500',
    ]);

    // Create the appointment
    $pet->appointments()->create([
        'pet_id' => $pet->id,
        //Laravel’s authentication helper function//
        //linking appointment to the user who is currently logged in.//
        'user_id' => auth()->id(),
        'appointment_type' => $request->appointment_type,
        'vet_name' => $request->vet_name,
        'clinic_name' => $request->clinic_name,
        'appointment_date' => $request->appointment_date,
        'vet_notes' => $request->vet_notes,
    ]);

    return redirect()->route('pets.show', $pet)->with('success', 'Appointment added successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        // Must be a vet
        if (auth()->user()->role !== 'vet') {
            return redirect()->back()->with('error', 'Only vets can edit appointments.');
        }
    
        return view('appointments.edit', compact('appointment'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
   // Must be a vet
   if (auth()->user()->role !== 'vet') {
    return redirect()->route('pets.show', $appointment->pet_id)
                     ->with('error', 'Only vets can update appointments.');
}

       // Validate input
    $request->validate([
        'appointment_type' => 'nullable|in:checkup,vaccination,surgery,grooming',
        'vet_name' => 'required|string|max:25',
        'clinic_name' => 'required|string|max:55',
        'appointment_date' => 'required|date|after_or_equal:today',
        'vet_notes' => 'nullable|string|max:500',
    ]);

        $appointment->update($request->only(['appointment_type', 'vet_name','clinic_name','appointment_date','vet_notes']));
        //redirect if successful//
        return redirect()->route('pets.show',$appointment->pet_id)
                ->with('success','Appointment updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
       // Must be vet
       if (auth()->user()->role !== 'vet') {
        return redirect()->back()->with('error', 'Only vets can delete appointments.');
    }
    //removes from database//
        $appointment->delete();
    //$appointment->pet_id = which pet does this appointment belong to?//
        return redirect() ->route('pets.show', $appointment->pet_id)
            ->with('success', 'Appointment deleted successfully.');
    }
    

}
