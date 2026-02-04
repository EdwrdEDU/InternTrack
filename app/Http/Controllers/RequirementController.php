<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    /**
     * Display the requirements checklist.
     */
    public function index()
    {
        $interns = Intern::with('requirement')->get();
        return view('requirements.index', compact('interns'));
    }

    /**
     * Show the form for editing requirements.
     */
    public function edit(Intern $intern)
    {
        $requirement = $intern->requirement;
        return view('requirements.edit', compact('intern', 'requirement'));
    }

    /**
     * Update the specified requirement in storage.
     */
    public function update(Request $request, $requirement)
    {
        $requirement = \App\Models\Requirement::findOrFail($requirement);

        $requirement->update([
            'pds' => $request->has('pds'),
            'waiver' => $request->has('waiver'),
            'med_cert' => $request->has('med_cert'),
            'moa' => $request->has('moa'),
            'photo_2x2' => $request->has('photo_2x2'),
            'accomplishment_report' => $request->has('accomplishment_report'),
            'certificate_of_completion' => $request->has('certificate_of_completion'),
        ]);

        return redirect()->back()->with('success', 'Requirements updated successfully!');
    }
}
