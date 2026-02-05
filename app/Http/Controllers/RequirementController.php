<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    /**
     * Update the specified requirement in storage.
     */
    public function update(Request $request, Requirement $requirement)
    {
        $requirement->update([
            'pds' => $request->has('pds'),
            'waiver' => $request->has('waiver'),
            'med_cert' => $request->has('med_cert'),
            'moa' => $request->has('moa'),
            'photo_2x2' => $request->has('photo_2x2'),
            'accomplishment_report' => $request->has('accomplishment_report'),
            'certificate_of_completion' => $request->has('certificate_of_completion'),
        ]);

        return redirect()->route('interns.edit', $requirement->intern_id)
            ->with('success', 'Requirements updated successfully!');
    }
}
