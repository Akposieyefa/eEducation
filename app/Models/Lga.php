<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lga extends Model
{
    use HasFactory;

    public function states() {
       return $this->belongsToMany(State::class, 'state_id');
    }

}
