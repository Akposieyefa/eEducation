<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id','fname', 'mname', 'lname', 'email' ,'occupation','gender','phone','home_address','office_address' ,
        'passport'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getProfileimageAttribute() {
        return $this->passport;
    }

    public function getFullnameAttribute() {
        return $this->fname." ". $this->mname." ". $this->lname;
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('fname', 'like', $term)
                ->orWhere('mname', 'like', $term)
                ->orWhere('lname', 'like', $term)
                ->orWhere('home_address', 'like', $term)
                ->orWhere('office_address', 'like', $term)
                ->orWhere('phone', 'like', $term)
                ->orWhere('occupation', 'like', $term)
                ->orWhereHas('user', function ($query) use ($term) {
                    $query->where('email', 'like', $term);
                });
        });
    }
}

