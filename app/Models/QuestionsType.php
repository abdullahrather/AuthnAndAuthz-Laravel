<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsType extends Model
{
    use HasFactory;
    protected $table = 'questions_type';
    protected $primaryKey = 'id';

    public function question_type()
    {
        return $this->hasMany(Questions::class, 'question_type_id');
    }
}
