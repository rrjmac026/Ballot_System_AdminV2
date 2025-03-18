<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $table = 'colleges';
    protected $primaryKey = 'college_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['name', 'acronym'];

    public function voters()
    {
        return $this->hasMany(Voter::class, 'college_id');
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'college_id');
    }
}
