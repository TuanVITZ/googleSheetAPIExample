<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'start_work_date',
        'department',
        'position',
        'team_size',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
