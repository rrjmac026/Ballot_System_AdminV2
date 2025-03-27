<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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
        'voted_at',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'voted_at' => 'datetime',
    ];

    protected $dates = [
        'voted_at',
        'created_at',
        'updated_at'
    ];

    public static function hashVote($candidateId)
    {
        return Hash::make($candidateId . env('APP_KEY'));
    }

    public function voter()
    {
        return $this->belongsTo(Voter::class, 'voter_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'candidate_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
