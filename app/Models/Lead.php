<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;


    //Lead has notes
    public function notes() {
        return $this->belongsToMany(Note::class, 'lead_note');
    }
}
