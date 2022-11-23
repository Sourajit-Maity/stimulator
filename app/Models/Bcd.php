<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bcd extends Model
{
    use HasFactory;
    protected $fillable = [
        'bcd_percentage',
        'bcd_actual',
        'active',
    ];
}
