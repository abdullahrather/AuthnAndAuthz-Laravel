<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HEIPrograms extends Model
{
    use HasFactory;
    protected $table = 'hei_programs';
    protected $primaryKey = 'id';
}
