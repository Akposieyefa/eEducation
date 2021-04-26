<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'teacher_id', 'fname', 'mname', 'lname', 'dob', 'gender', 'nationality', 'address',
        'state_id', 'lga_id', 'level_id', 'passport', 'employment_date', 'resume'
    ];

    public function getFullnameAttribute()
    {
        return $this->fname . " " . $this->mname . " " . $this->lname;
    }

    public function getProfileimageAttribute()
    {
        return $this->passport;
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class, 'lga_id');
    }

    // public function arm() {
    //     return $this->belongsTo(Arm::class, 'arm_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('fname', 'like', $term)
                ->orWhere('mname', 'like', $term)
                ->orWhere('lname', 'like', $term)
                ->orWhere('teacher_id', 'like', $term)
                ->orWhere('gender', 'like', $term)
                ->orWhereHas('user', function ($query) use ($term) {
                    $query->where('email', 'like', $term);
                });
        });
    }
}
