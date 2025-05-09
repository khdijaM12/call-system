<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Support\Facades\Hash;
class Employee extends Model
{
  

public function setPasswordAttribute($value)
{
    $this->attributes['password'] = Hash::make($value);
}

    protected $fillable = [
        'name',
        'phone',
        'password',
        'job_description',
    ];

    public function calls()
    {
        return $this->hasMany(Call::class);
    }   
}

