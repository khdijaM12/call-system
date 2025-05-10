<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
        protected $fillable = ['name'];

public function calls()
    {
        return $this->hasMany(Call::class, 'status_id');
    }

}
