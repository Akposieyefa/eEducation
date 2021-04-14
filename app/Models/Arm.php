<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arm extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'level_id'
    ];


    public function teachers() {
        return $this->hasMany(Teacher::class);
    }

    public function level() {
       return $this->belongsTo(Level::class, 'level_id');
    }

}
