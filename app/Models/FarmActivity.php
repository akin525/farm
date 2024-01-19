<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmActivity extends Model
{
    protected $fillable = ['farm_unit_id', 'employee_id', 'activity_name'];

    public function farmUnit()
    {
        return $this->belongsTo(FarmUnit::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
