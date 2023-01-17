<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'name',
        'course_id',
        // 'class_date',
        // 'class_day',
        // 'class_time'
    ];
    protected $table = 'curriculums';
    use HasFactory;

    //Curriculum has homeworks
    public function homeworks() {
        return $this->hasMany(Curriculum::class);
    }

    //Curriculum has attendances
    public function attendances() {
        return $this->hasMany(Attendance::class);
    }

    public function notes() {
        return $this->belongsToMany(Note::class, 'curriculum_note');
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
