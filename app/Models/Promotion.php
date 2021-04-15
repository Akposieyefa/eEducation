<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'from', 'to', 'section_id', 'teacher_id'
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function from() {
        return $this->belongsTo(Level::class, 'from');
    }

    public function to() {
        return $this->belongsTo(Level::class, 'to');
    }

    public function section() {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }


}
