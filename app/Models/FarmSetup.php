<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmSetup extends Model
{
    protected $fillable = ['name', 'contact_number'];

    public function units()
    {
        return $this->hasMany(FarmUnit::class);
    }
}
