<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday  extends Model
{
    use HasFactory;
    
    protected $table = 'listofholidays';

    protected $fillable = [
        'name',
        'date',
        'status',
    ];

    protected $casts = [
        'date' => 'date', // Cast the date attribute to a Carbon instance
    ];
}
