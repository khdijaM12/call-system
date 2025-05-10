<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintTypes extends Model
{
            protected $fillable = ['name'];
    public function calls()
    {
        return $this->hasMany(Call::class, 'complaint_type_id');
    }

}
