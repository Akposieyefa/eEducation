<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Level extends Model
{
    use HasFactory;

    protected $fillable =[
       'name'
    ];

    public function students() {
       return $this->hasMany(Student::class);
    }

    public function teachers() {
       return $this->belongsToMany(Teacher::class);
    }

    public function subjects() {
       return $this->belongsToMany(Subject::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term);
        });
    }

}
