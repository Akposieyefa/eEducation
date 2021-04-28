<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id', 'fname', 'mname', 'lname', 'phone', 'address', 'passport', 'gender'
    ];

    public function getFullnameAttribute() {
        return $this->fname." ". $this->mname." ". $this->lname;
    }

    public function getProfileimageAttribute() {
        return $this->passport;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('fname', 'like', $term)
                ->orWhere('mname', 'like', $term)
                ->orWhere('lname', 'like', $term)
                ->orWhere('address', 'like', $term)
                ->orWhere('phone', 'like', $term)
                ->orWhere('gender', 'like', $term)
                ->orWhereHas('user', function ($query) use ($term) {
                    $query->where('email', 'like', $term);
                });
        });
    }
}
