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
        'user_id' => 'required|exists:users,id',
        'appointment_type' => 'nullable|in:checkup,vaccination,surgery,grooming',
        'vet_name' => 'nullable|string|max:25',
        'clinic_name' => 'nullable|string|max:55',
        'appointment_date' => 'required|date|after_or_equal:today',
        'vet_notes' => 'nullable|string',
    ]);

    // Create the appointment
    $pet->appointments()->create([
        'user_id' => $request->user_id,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
