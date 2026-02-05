<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\Requirement;
use Illuminate\Http\Request;

class InternController extends Controller
{
    /**
     * Display a listing of the interns.
     */
    public function index(Request $request)
    {
        $query = Intern::with('requirement');
        
        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $interns = $query->latest()->get();
        return view('interns.index', compact('interns'));
    }

    /**
     * Show the form for creating a new intern.
     */
    public function create()
    {
        return view('interns.create');
    }

    /**
     * Store a newly created intern in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:Waiting,Ongoing,Finished',
            'school' => 'nullable|string|max:255',
            'course' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'department' => 'nullable|string|max:255',
            'supervisor_trainer_name' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'pds' => 'nullable|boolean',
            'waiver' => 'nullable|boolean',
            'med_cert' => 'nullable|boolean',
            'moa' => 'nullable|boolean',
            'photo_2x2' => 'nullable|boolean',
            'accomplishment_report' => 'nullable|boolean',
            'certificate_of_completion' => 'nullable|boolean',
        ]);

        $intern = Intern::create($validated);
        
        // Create requirement record with checkbox values
        Requirement::create([
            'intern_id' => $intern->id,
            'pds' => $request->has('pds'),
            'waiver' => $request->has('waiver'),
            'med_cert' => $request->has('med_cert'),
            'moa' => $request->has('moa'),
            'photo_2x2' => $request->has('photo_2x2'),
            'accomplishment_report' => $request->has('accomplishment_report'),
            'certificate_of_completion' => $request->has('certificate_of_completion'),
        ]);

        return redirect()->route('interns.index')->with('success', 'Intern added successfully!');
    }

    /**
     * Show the form for editing the specified intern.
     */
    public function edit(Intern $intern)
    {
        // Ensure the intern has a requirement record
        if (!$intern->requirement) {
            Requirement::create([
                'intern_id' => $intern->id,
                'pds' => false,
                'waiver' => false,
                'med_cert' => false,
                'moa' => false,
                'photo_2x2' => false,
                'accomplishment_report' => false,
                'certificate_of_completion' => false,
            ]);
            $intern->load('requirement');
        }
        
        return view('interns.edit', compact('intern'));
    }

    /**
     * Update the specified intern in storage.
     */
    public function update(Request $request, Intern $intern)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:Ongoing,Finished',
            'school' => 'nullable|string|max:255',
            'course' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'department' => 'nullable|string|max:255',
            'supervisor_trainer_name' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $intern->update($validated);

        return redirect()->route('interns.index')->with('success', 'Intern updated successfully!');
    }

    /**
     * Remove the specified intern from storage.
     */
    public function destroy(Intern $intern)
    {
        $intern->delete();
        return redirect()->route('interns.index')->with('success', 'Intern deleted successfully!');
    }
}
