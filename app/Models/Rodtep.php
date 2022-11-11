<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rodtep extends Model
{
    use HasFactory;
    protected $fillable = [
        'rodtep_percentage',
        'rodtep_actual',
        'active',
    ];
}
