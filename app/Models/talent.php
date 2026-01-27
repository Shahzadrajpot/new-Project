<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class talent extends Model
{
    use HasFactory;
    protected $fillable = [
        'client',
        'phone',
        'email',
        'status',
        'date',
        
    ];
}
