<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Appointment model represents the appointments table in your database//
class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'pet_id',
        'user_id',            
        'appointment_type',
        'vet_name',
        'clinic_name',
        'appointment_date',
        'vet_notes',
    ];

//An appointment belongs to one pet.//
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
    //An appointment belongs to one user (the person who created it).//
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
