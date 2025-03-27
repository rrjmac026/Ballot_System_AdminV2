<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        'partylist_id',   
        'organization_id', 
        'position_id',     
        'college_id', 
        'course',          
        'photo',           
        'platform'
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

    public function castedVotes()
    {
        return $this->hasMany(CastedVote::class, 'candidate_id', 'candidate_id');
    }

    public function getCastedVotesCountAttribute()
    {
        return DB::table('casted_votes')
            ->where('candidate_id', $this->candidate_id)
            ->where('position_id', $this->position_id)
            ->count();
    }

    public function scopeWithVoteCount($query)
    {
        return $query->addSelect([
            'casted_votes_count' => DB::raw("(
                SELECT COUNT(*)
                FROM casted_votes
                WHERE JSON_EXTRACT(votes, CONCAT('$.', candidates.position_id)) = CAST(candidates.candidate_id AS CHAR)
            )")
        ]);
    }

    public function getVoteCountAttribute()
    {
        return $this->castedVotes()
            ->where('position_id', $this->position_id)
            ->count();
    }
}
