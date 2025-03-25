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
        return $this->hasMany(CastedVote::class, 'votes->' . $this->position_id, 'candidate_id')
            ->whereJsonContains("votes->{$this->position_id}", DB::raw('candidate_id'));
    }

    // Add this method for photo URL
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return Storage::disk('public')->url('candidates/' . $this->photo);
        }
        return asset('images/default-avatar.png');
    }

    public function getCastedVotesCountAttribute()
    {
        return CastedVote::whereJsonContains("votes->{$this->position_id}", (string)$this->candidate_id)->count();
    }

    public function getVoteCountAttribute()
    {
        return CastedVote::whereJsonContains('votes->' . $this->position_id, $this->candidate_id)->count();
    }
}
