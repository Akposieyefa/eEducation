<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Term extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'start_date', 'end_date', 'section_id', 'status'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
