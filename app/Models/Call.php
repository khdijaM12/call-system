<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ComplaintTypes;
use App\Models\Statuses;

class Call extends Model
{
      protected $fillable = [
        'complaint_text',
        'stat_text',
        'complaint_type_id',
        'status_id',
        'client_id',
        'assigned_to'
    ];
    public function assignedEmployee()
    {
        return $this->belongsTo(Employee::class, 'assigned_to');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function complaintType()
{
    return $this->belongsTo(ComplaintTypes::class, 'complaint_type_id');
}

public function status()
{
    return $this->belongsTo(Statuses::class, 'status_id');
}
  
}
