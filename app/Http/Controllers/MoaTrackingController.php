<?php

namespace App\Http\Controllers;

use App\Models\MoaTracking;
use App\Models\Intern;
use Illuminate\Http\Request;

class MoaTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moaRecords = MoaTracking::with('intern')->latest()->get();
        return view('moa.index', compact('moaRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $interns = Intern::all();
        return view('moa.create', compact('interns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'intern_id' => 'required|exists:interns,id',
            'moa' => 'required|string|max:255',
            'valid_until' => 'nullable|date',
        ]);

        MoaTracking::create($validated);

        return redirect()->route('moa.index')->with('success', 'MOA record added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MoaTracking $moa)
    {
        $interns = Intern::all();
        return view('moa.edit', compact('moa', 'interns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MoaTracking $moa)
    {
        $validated = $request->validate([
            'intern_id' => 'required|exists:interns,id',
            'moa' => 'required|string|max:255',
            'valid_until' => 'nullable|date',
        ]);

        $moa->update($validated);

        return redirect()->route('moa.index')->with('success', 'MOA record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MoaTracking $moa)
    {
        $moa->delete();
        return redirect()->route('moa.index')->with('success', 'MOA record deleted successfully!');
    }
}
