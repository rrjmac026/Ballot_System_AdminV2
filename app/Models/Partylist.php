<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partylist extends Model
{
    use HasFactory;

    protected $table = 'partylists';
    protected $primaryKey = 'partylist_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['name', 'description'];

    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'partylist_id');
    }
}
