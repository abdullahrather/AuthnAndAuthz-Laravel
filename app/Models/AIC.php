<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIC extends Model
{
    use HasFactory;
    protected $table = 'aic';
    protected $primaryKey = 'id';

    public function aic()
    {
        return $this->belongsTo(Expertise::class, 'expertise_id');
    }
}
