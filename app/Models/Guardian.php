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
    
    public function getFullnameAttribute() {
        return $this->fname." ". $this->mname." ". $this->lname;
    }

    public function students() {
        return $this->hasMany(Student::class);
    }
}

