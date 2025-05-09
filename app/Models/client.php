<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = ['name', 'phone'];
    public function calls()
    {
        return $this->hasMany(Call::class);
    }
}
