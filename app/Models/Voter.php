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
        'student_number', 
        'first_name', 
        'last_name', 
        'middle_name',
        'email', 
        'password', 
        'college_id', 
        'course',
    ];

    protected $hidden = ['password'];

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
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
