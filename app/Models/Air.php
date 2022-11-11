<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Air extends Model
{
    use HasFactory;
    protected $fillable = [
        'air_percentage',
        'air_actual',
        'active',
    ];
}
