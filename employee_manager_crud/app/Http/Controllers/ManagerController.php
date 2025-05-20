<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = Manager::with('employees')->get();
        return view('managers.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('managers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'start_work_date' => 'required|date',
            'department' => 'required',
            'position' => 'nullable',
            'team_size' => 'nullable|integer',
            'email' => 'required|email|unique:managers,email',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $data['password'] = \Hash::make($data['password']);
        Manager::create($data);
        return redirect()->route('managers.index')->with('success', 'Manager created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manager $manager)
    {
        return view('managers.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manager $manager)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'start_work_date' => 'required|date',
            'department' => 'required',
            'position' => 'nullable',
            'team_size' => 'nullable|integer',
            'email' => 'required|email|unique:managers,email,' . $manager->id,
            'password' => 'nullable|min:6',
        ]);
        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = \Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $manager->update($data);
        return redirect()->route('managers.index')->with('success', 'Manager updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('managers.index')->with('success', 'Manager deleted successfully.');
    }
}
