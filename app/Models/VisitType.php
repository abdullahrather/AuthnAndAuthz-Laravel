<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitType extends Model
{
    use HasFactory;
    protected $table = 'visit_types';
    protected $primaryKey = 'id';

    public function visit_types_questions()
    {
        return $this->belongsToMany(Questions::class);
    }
}
