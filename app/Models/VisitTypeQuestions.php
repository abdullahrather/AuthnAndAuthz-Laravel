<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitTypeQuestions extends Model
{
    use HasFactory;
    protected $table = 'visit_types_questions';
    protected $primaryKey = 'id';
}
