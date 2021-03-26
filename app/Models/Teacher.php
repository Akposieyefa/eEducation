<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','teacher_id','fname', 'mname', 'lname', 'dob', 'gender', 'nationality', 'address', 'religion',
        'state_id', 'lga_id', 'level_id', 'arm_id', 'passport', 'employment_date'
    ];

    public function level() {
       return $this->belongsTo(Level::class, 'level_id');
    }

    public function state() {
       return $this->belongsTo(State::class, 'state_id');
    }

    public function lga() {
       return $this->belongsTo(Lga::class, 'lga_id');
    }

    public function arm() {
        return $this->belongsTo(Arm::class, 'arm_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
