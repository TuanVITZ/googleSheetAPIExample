<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $managers = Manager::with('employees')->get();
        $employees = Employee::with('manager')->get();
        return view('dashboard', compact('managers', 'employees'));
    }
}
