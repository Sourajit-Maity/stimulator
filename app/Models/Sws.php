<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sws extends Model
{
    use HasFactory;
    protected $fillable = [
        'sws_percentage',
        'sws_actual',
        'active',
    ];
}
