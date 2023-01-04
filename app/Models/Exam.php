<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;


    //Exam has homeworks
    public function homeworks() {
        return $this->hasmany(Homework::class);
    }
}
