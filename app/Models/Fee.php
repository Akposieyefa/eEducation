<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount','section_id','term_id', 'level_id'
    ];

    public function section() {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function term() {
        return $this->belongsTo(Term::class, 'term_id');
    }

    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('amount', 'like', $term)
                ->orWhereHas('term', function ($query) use ($term) {
                    $query->where('name', 'like', $term);
                })
                ->orWhereHas('section', function ($query) use ($term) {
                    $query->where('name', 'like', $term);
                })
                ->orWhereHas('level', function ($query) use ($term) {
                    $query->where('name', 'like', $term);
                });
        });
    }
}
