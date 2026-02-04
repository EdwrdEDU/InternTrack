<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoaTracking extends Model
{
    protected $table = 'moa_tracking';

    protected $fillable = [
        'moa',
        'valid_until',
    ];

    protected $casts = [
        'valid_until' => 'date',
    ];
}
