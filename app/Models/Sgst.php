<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sgst extends Model
{
    use HasFactory;
    protected $fillable = [
        'sgst_percentage',
        'sgst_actual',
        'active',
    ];
}
