<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'start_work_date',
        'department',
        'position',
        'team_size',
        'email',
        'password',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
