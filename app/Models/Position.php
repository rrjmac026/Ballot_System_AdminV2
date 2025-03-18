<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';
    protected $primaryKey = 'position_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['name', 'organization_id', 'max_winners'];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'position_id');
    }
}
