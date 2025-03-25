<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CastedVote extends Model
{
    use HasFactory;

    protected $table = 'casted_votes';
    protected $primaryKey = 'casted_vote_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'transaction_number',
        'voter_id',
        'votes', // ✅ Store multiple votes as JSON
        'vote_hash',
        'voted_at',
        'ip_address',
        'user_agent'
    ];

    protected $dates = ['voted_at'];

    protected $casts = [
        'votes' => 'array', // ✅ Automatically decode JSON votes
        'voted_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (!$model->transaction_number) {
                $model->transaction_number = 'TXN-' . date('Ymd') . '-' . strtoupper(Str::random(6));
            }
        });
    }

    // ✅ Hash all votes instead of a single candidate ID
    public static function hashVote($votes)
    {
        return Hash::make(json_encode($votes) . env('APP_KEY'));
    }

    // ✅ Get positions that the voter hasn't voted for
    public static function getRemainingPositions($voterId)
    {
        $castedVote = self::where('voter_id', $voterId)->first();
        $votedPositions = $castedVote ? array_keys(json_decode($castedVote->votes, true)) : [];
            
        return Position::whereNotIn('position_id', $votedPositions)
            ->orderBy('position_order')
            ->get();
    }

    // ✅ Display voter details in admin panel
    public function getVoterTypeAttribute()
    {
        return "College: {$this->voter->college->acronym}, Year: {$this->voter->year_level}";
    }

    // ✅ Get formatted candidate details (list all voted candidates)
    public function getCandidateDetailsAttribute()
    {
        $votes = json_decode($this->votes, true);
        $details = [];

        foreach ($votes as $positionId => $candidateId) {
            $position = Position::find($positionId);
            $candidate = Candidate::find($candidateId);
            if ($position && $candidate) {
                $details[] = "{$position->name}: {$candidate->name} ({$candidate->partylist->acronym})";
            }
        }

        return implode(', ', $details);
    }

    public function getCandidateVotesForPosition($positionId)
    {
        $votes = $this->votes;
        return $votes[$positionId] ?? null;
    }

    public function getCandidateVotesAttribute()
    {
        return collect($this->votes)->map(function ($candidateId, $positionId) {
            return [
                'position_id' => $positionId,
                'candidate_id' => $candidateId
            ];
        });
    }

    public function voter()
    {
        return $this->belongsTo(Voter::class, 'voter_id');
    }

    public function getPositionDetails()
    {
        if (is_array($this->votes)) {
            $details = [];
            foreach ($this->votes as $positionId => $candidateId) {
                $position = Position::find($positionId);
                $candidate = Candidate::find($candidateId);
                if ($position && $candidate) {
                    $details[] = [
                        'position' => $position,
                        'candidate' => $candidate
                    ];
                }
            }
            return $details;
        }
        return [];
    }

    public function positions()
    {
        if (!is_array($this->votes)) return collect();
        return Position::whereIn('position_id', array_keys($this->votes))->get();
    }

    public function candidates()
    {
        if (!is_array($this->votes)) return collect();
        return Candidate::whereIn('candidate_id', array_values($this->votes))->get();
    }

    public function getCandidate($position_id)
    {
        if (isset($this->votes[$position_id])) {
            return Candidate::find($this->votes[$position_id]);
        }
        return null;
    }

    // Helper method to get position data
    public function getPosition($position_id)
    {
        return Position::find($position_id);
    }

    // Helper method to get position name
    public function getPositionNameAttribute()
    {
        $votes = json_decode($this->votes, true);
        $position_id = array_key_first($votes);
        $position = $this->getPosition($position_id);
        return $position ? $position->name : 'Unknown Position';
    }

    public function getCandidateVotes()
    {
        return collect($this->votes)->map(function($candidateId, $positionId) {
            $candidate = Candidate::find($candidateId);
            $position = Position::find($positionId);
            return [
                'position' => $position,
                'candidate' => $candidate
            ];
        });
    }

    public function getCandidatesAttribute()
    {
        $candidateIds = collect($this->votes)->values();
        return Candidate::whereIn('candidate_id', $candidateIds)->get();
    }

    public function getVotedCandidateForPosition($positionId)
    {
        if (isset($this->votes[$positionId])) {
            return Candidate::find($this->votes[$positionId]);
        }
        return null;
    }

    public function getVotingDetailsAttribute()
    {
        return collect($this->votes)->map(function($candidateId, $positionId) {
            $position = Position::find($positionId);
            $candidate = Candidate::find($candidateId);
            if ($position && $candidate) {
                return [
                    'position' => $position,
                    'candidate' => $candidate
                ];
            }
        })->filter();
    }

    public function getVoterDetailsAttribute()
    {
        return $this->voter ? [
            'college' => $this->voter->college->name,
            'year_level' => $this->voter->year_level
        ] : null;
    }
}
