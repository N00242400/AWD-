<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
   use HasFactory;

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