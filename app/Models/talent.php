<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class talent extends Model
{
    use HasFactory;
    /**
     * Explicit table name to match migration.
     */
    protected $table = 'talents';
    protected $fillable = [
        'client',
        'phone',
        'email',
        'status',
        'date',

    ];
}
