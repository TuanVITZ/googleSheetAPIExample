<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'start_work_date',
        'department',
        'manager_id',
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}
