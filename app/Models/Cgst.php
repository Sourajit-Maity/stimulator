<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cgst extends Model
{
    use HasFactory;
    protected $fillable = [
        'cgst_percentage',
        'cgst_actual',
        'active',
    ];
}
