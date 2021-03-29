<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id','level_id'
    ];

    public  function level() {
       return $this->belongsTo(Level::class, 'level_id');
    }

    public  function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public  $timestamps = false;
}
