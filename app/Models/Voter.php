<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Voter extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'voters';
    protected $primaryKey = 'voter_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'sex',
        'student_number',
        'email',
        'college_id',
        'course',
        'year_level',
        'status',
    ];

    protected $hidden = ['password', 'passkey']; // Removed 'raw_passkey' for security

    /**
     * Mutator: Hash the passkey before storing it
     */
    public function setPasskeyAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['passkey'] = Hash::make($value);
        }
    }

    /**
     * Verify the passkey
     */
    public function verifyPasskey($passkey)
    {
        return Hash::check($passkey, $this->passkey);
    }

    /**
     * Relationships
     */
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'college_id');
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'voter_id');
    }

    public function castedVotes()
    {
        return $this->hasMany(CastedVote::class, 'voter_id');
    }
}
