<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'assigned_to');
    }

    protected $fillable = [
        'client_name',
        'client_phone',
        'complaint_text',
        'complaint_type',
        'status',
        'assigned_to',
    ];
}
