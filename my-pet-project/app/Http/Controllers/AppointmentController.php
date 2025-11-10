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
        //checks if user is the owner or an admin//
        if(auth()->user() !== $appointment->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('pets.show')->with('error', 'Access denied.');
        }
        //passing the pet and review object to the views//
        return view('appointments.edit',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
          // Check if user is the owner or an admin
    if(auth()->id() !== $appointment->user_id && auth()->user()->role !== 'admin') {
        return redirect()->route('pets.show', $appointment->pet_id)
                         ->with('error', 'Access denied.');
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

    $appointment->delete();
       return redirect()->route('pets.show',$appointment->pet_id)
                ->with('success','Appointment updated succesfully.');
}

}
