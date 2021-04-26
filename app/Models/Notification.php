<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','body', 'role_id'
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term)
                ->orWhereHas('role', function ($query) use ($term) {
                    $query->where('name', 'like', $term);
                });
        });
    }
}
