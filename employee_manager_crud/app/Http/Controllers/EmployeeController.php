<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('manager')->get();
        $managers = Manager::with('employees')->get();
        return view('employees.index', compact('employees', 'managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = Manager::all();
        return view('employees.create', compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'start_work_date' => 'required|date',
            'department' => 'required',
            'manager_id' => 'nullable|exists:managers,id',
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $managers = Manager::all();
        return view('employees.edit', compact('employee', 'managers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'start_work_date' => 'required|date',
            'department' => 'required',
            'manager_id' => 'nullable|exists:managers,id',
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
