<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Igst extends Model
{
    use HasFactory;
    protected $fillable = [
        'igst_percentage',
        'igst_actual',
        'active',
    ];
}
