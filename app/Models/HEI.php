<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HEI extends Model
{
    use HasFactory;
    protected $table = 'hei';
    protected $primaryKey = 'id';

    public function application_hei()
    {
        return $this->hasMany(Application::class, 'hei_id');
    }

    public function hei_programs()
    {
        return $this->belongsToMany(Programs::class);
    }
}
