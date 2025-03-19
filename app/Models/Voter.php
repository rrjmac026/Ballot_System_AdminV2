<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Extend User authentication
use Illuminate\Notifications\Notifiable;

class Voter extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'voters';
    protected $primaryKey = 'voter_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'student_number',
        'email',
        'college_id',
        'course',
        'year_level',
        'status',
        'passkey'
    ];

    protected $hidden = ['password', 'passkey'];

    // Add mutator to automatically hash passkey
    public function setPasskeyAttribute($value)
    {
        $this->attributes['passkey'] = bcrypt($value);
    }

    // Add method to verify passkey
    public function verifyPasskey($passkey)
    {
        return password_verify($passkey, $this->passkey);
    }

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
