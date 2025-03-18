<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'organizations';
    protected $primaryKey = 'organization_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['name', 'description', 'college_id'];

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class, 'organization_id');
    }
}
