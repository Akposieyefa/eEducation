<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;

class GuardainStudent extends Model
{
    use HasFactory;

    protected $table ='guardian_student';

    protected $fillable =[
        'guardian_id', 'student_id'
    ];
    public  $timestamps = false;
}
