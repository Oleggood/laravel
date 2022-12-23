<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::all();
        return view ('admin.department.index', [
            'departments' => $departments,
        ]);
    }

    public function create () {
        return view ('admin.department.create');
    }

    public function store(DepartmentRequest $request) {
        $department = new Department;
        $department -> fill($request->validated());
        $department->save();
        return redirect()->route('departments.index');
    }

    public function show (Department $department) {
        return view('admin.department.show', [
            'department' => $department,
        ]);
    }

    public function edit(Department $department) {
        return view('admin.department.edit', [
            'department' => $department,
        ]);
    }

    public function update (DepartmentRequest $request, Department $department) {
        $department->update($request->validated());
        return redirect()->route('departments.show', $department->id);
    }
   
    public function destroy (Department $department) {
        $department->delete();
        return redirect()->route('departments.index');
    }

}
