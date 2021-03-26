<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    use HasFactory;

    public function lgas() {
       return $this->belongsToMany(Lga::class);
    }

    public function students() {
       return $this->belongsTo(Student::class);
    }

    public function teachers() {
        return $this->belongsTo(Teacher::class);
     }
}
