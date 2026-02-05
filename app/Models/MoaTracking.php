<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoaTracking extends Model
{
    protected $table = 'moa_tracking';

    protected $fillable = [
        'intern_id',
        'moa',
        'valid_until',
    ];

    protected $casts = [
        'valid_until' => 'date',
    ];

    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }

    public function isValid()
    {
        if (!$this->valid_until) {
            return null; // No date set
        }
        return $this->valid_until >= now()->startOfDay();
    }

    public function getStatusAttribute()
    {
        if (!$this->valid_until) {
            return 'No Date';
        }
        return $this->isValid() ? 'Valid' : 'Expired';
    }
}
