<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';
    protected $primaryKey = 'candidate_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'candidate_id',
        'first_name',
        'last_name',
        'middle_name',
        'partylist_id',   // Foreign key for partylist
        'organization_id', // Foreign key for organization
        'position_id',     // Foreign key for position
        'college_id',      // Foreign key for college
        'course',          // Course name (if needed)
    ];

    public function voter()
    {
        return $this->belongsTo(Voter::class, 'candidate_id');
    }

    public function partylist()
    {
        return $this->belongsTo(Partylist::class, 'partylist_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }
}
