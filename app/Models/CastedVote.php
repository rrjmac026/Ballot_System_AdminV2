<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastedVote extends Model
{
    use HasFactory;

    protected $table = 'casted_votes';
    protected $primaryKey = 'casted_vote_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['voter_id', 'candidate_id', 'position_id', 'election_type'];

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
