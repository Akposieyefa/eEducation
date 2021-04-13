<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'score', 'term_id', 'subject_id', 'level_id'
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }



}
