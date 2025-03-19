<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $primaryKey = 'position_id';
    protected $fillable = ['name'];

    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'position_id', 'position_id');
    }
}
