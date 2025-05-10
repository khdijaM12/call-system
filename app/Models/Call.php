<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
      protected $fillable = [
        'complaint_text',
        'stat_text',
       'text',
        'complaint_type_id',
        'status_id',
        'client_id',
        'employee_id',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'assigned_to');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function complaintType()
    {
        return $this->belongsTo(complaint_type::class, 'complaint_type_id');
    }

    public function status()
    {
        return $this->belongsTo(status::class, 'status_id');
    }
  
}
