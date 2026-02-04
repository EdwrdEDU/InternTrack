<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'intern_id',
        'pds',
        'waiver',
        'med_cert',
        'moa',
        'photo_2x2',
        'accomplishment_report',
        'certificate_of_completion',
    ];

    protected $casts = [
        'pds' => 'boolean',
        'waiver' => 'boolean',
        'med_cert' => 'boolean',
        'moa' => 'boolean',
        'photo_2x2' => 'boolean',
        'accomplishment_report' => 'boolean',
        'certificate_of_completion' => 'boolean',
    ];

    /**
     * Get the intern that owns the requirement.
     */
    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }
}
