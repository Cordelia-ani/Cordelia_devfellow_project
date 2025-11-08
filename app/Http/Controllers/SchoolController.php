<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:schools',
            'address' => 'nullable|string|max:255',
        ]);

        School::create($request->all());
        return redirect()->route('schools.index')->with('success', 'School created successfully!');
    }

    public function edit(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:schools,email,' . $school->id,
            'address' => 'nullable|string|max:255',
        ]);

        $school->update($request->all());
        return redirect()->route('schools.index')->with('success', 'School updated successfully!');
    }

    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->route('schools.index')->with('success', 'School deleted successfully!');
    }
}

// Minimal model definition to satisfy static analysis if App\Models\School is missing.
// In a real project you should move this to app/Models/School.php.
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'email', 'address'];
}
