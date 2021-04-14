<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id','student_id','fname', 'mname', 'lname', 'dob', 'gender', 'nationality', 'address', 'religion',
        'state_id', 'lga_id', 'level_id', 'passport', 'addmited_date'
    ];

    public function getFullnameAttribute() {
        return $this->fname." ". $this->mname." ". $this->lname;
    }

    public function getProfileimageAttribute() {
        return $this->passport;
    }

    public function level() {
       return $this->belongsTo(Level::class, 'level_id');
    }

    public function state() {
       return $this->belongsTo(State::class, 'state_id');
    }

    public function lga() {
       return $this->belongsTo(Lga::class, 'lga_id');
    }

    // public function arm() {
    //     return $this->belongsTo(Arm::class, 'arm_id');
    // }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guardian() {
        return $this->belongsTo(Guardian::class);
    }

    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('fname', 'like', $term)
            ->orWhere('mname', 'like', $term)
            ->orWhereHas('lga', function($query) use ($term) {
                $query->where('name', 'like', $term);
            });
        });
    }

    
}
