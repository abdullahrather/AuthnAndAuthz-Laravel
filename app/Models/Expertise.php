<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;
    protected $table = 'expertise';
    protected $primaryKey = 'id';

    public function aic_expertise()
    {
        return $this->hasMany(AIC::class, 'expertise_id');
    }
}
