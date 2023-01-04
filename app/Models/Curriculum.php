<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    //Curriculum has homeworks
    public function homeworks() {
        return $this->hasMany(Curriculum::class);
    }

    //Curriculum has attendances
    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}
