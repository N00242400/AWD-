<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable; 

//creating a pet model//
class Pet extends Model
{
   //trait you add to models (allows you to generate fake users) //
   use HasFactory;
   use Searchable; //make this model searchable


//mass assignment protection feature//
//Attributes not in this list will be ignored//
    protected $fillable = [
        'name',
        'age',
        'species',
        'description',
        'image',
        'created_at',
        'updated_at',
    ];

    public function toSearchableArray()
    {
        return [
            'name'        => $this->name,
            'species'     => $this->species,
            'age'         => $this->age,
        ];
    }






//pet can have many appointments//
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    //pet can have many owners//

    public function owners()
    {
        return $this->belongsToMany(Owner::class);
    }
}