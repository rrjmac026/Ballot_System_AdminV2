<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceSetting extends Model
{
    protected $fillable = ['key', 'value', 'description'];
}
