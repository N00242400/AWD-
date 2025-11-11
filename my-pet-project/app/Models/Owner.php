<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone_number','image'];
    //owner can have many pets//
    public function pets()
    {
        //Laravel will write the necessary functions for this manytomany relationships//
        return $this->belongsToMany(Pet::class);
    }
}
