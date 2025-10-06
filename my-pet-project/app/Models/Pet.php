<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//creating a pet model//
class Pet extends Model
{
   //trait you add to models (allows you to generate fake users) //
   use HasFactory;
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
}