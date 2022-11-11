<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteScrap extends Model
{
    use HasFactory;
    protected $fillable = [
        'waste_scrap_percentage',
        'waste_scrap_actual',
        'active',
    ];
}
