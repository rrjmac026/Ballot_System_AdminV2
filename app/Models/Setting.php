<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'election_start',
        'election_end',
        'maintenance_mode',
        'registration_enabled',
        'voting_enabled',
        'results_enabled'
    ];

    protected $casts = [
        'election_start' => 'datetime',
        'election_end' => 'datetime',
        'maintenance_mode' => 'boolean',
        'registration_enabled' => 'boolean',
        'voting_enabled' => 'boolean',
        'results_enabled' => 'boolean'
    ];
}
