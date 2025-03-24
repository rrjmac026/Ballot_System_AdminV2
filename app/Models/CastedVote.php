<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
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
        'position_id',
        'candidate_id',
        'vote_hash',
        'voted_at'
    ];

    protected $dates = ['voted_at'];

    protected $casts = [
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

    public static function hashVote($candidate_id)
    {
        return Hash::make($candidate_id . env('APP_KEY'));
    }

    public static function getRemainingPositions($voterId)
    {
        $votedPositions = self::where('voter_id', $voterId)
            ->pluck('position_id')
            ->toArray();
            
        return Position::whereNotIn('position_id', $votedPositions)
            ->orderBy('position_order')
            ->get();
    }

    public function getVoterTypeAttribute()
    {
        return "College: {$this->voter->college->acronym}, Year: {$this->voter->year_level}";
    }

    public function getCandidateDetailsAttribute()
    {
        return "{$this->candidate->partylist->acronym} - {$this->candidate->college->acronym}";
    }

    public function voter()
    {
        return $this->belongsTo(Voter::class, 'voter_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
