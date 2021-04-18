<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id' ,'trans_ref', 'term_id', 'amount', 'guardian_id', 'status'
    ];

    public function student() {
        return $this->hasOne(Student::class, 'student_id', 'student_id');
    }

    public function guardian() {
        return $this->belongsTo(Guardian::class, 'guardian_id', 'guardian_id');
    }

    public function term() {
        return $this->belongsTo(Term::class, 'term_id');
    }
}
