<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $primaryKey = 'id';

    public function application()
    {
        return $this->belongsTo(HEI::class, 'hei_id');
    }
}
