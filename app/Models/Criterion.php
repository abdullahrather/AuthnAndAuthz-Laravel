<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    use HasFactory;
    protected $table = 'criterion';
    protected $primaryKey = 'id';

    public function question_criterion()
    {
        return $this->hasMany(Questions::class, 'criterion_id');
    }
}
