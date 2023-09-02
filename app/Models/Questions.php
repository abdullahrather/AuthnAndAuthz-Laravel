<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $primaryKey = 'id';

    public function question()
    {
        return $this->belongsTo(QuestionsType::class, 'question_type_id');
    }
    public function criterion()
    {
        return $this->belongsTo(criterion::class, 'criterion_id');
    }

    public function questions_visit_types()
    {
        return $this->belongsToMany(VisitType::class);
    }
}
