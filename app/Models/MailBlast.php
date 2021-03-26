<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailBlast extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject', 'message'
    ];
}
