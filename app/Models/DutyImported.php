<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DutyImported extends Model
{
    use HasFactory;
    protected $fillable = [
        'overall_sale_id',
        'type',
        'subtype',
        'value',
        'bcd_rate',
        'bcd_amount',
        'sws_rate',
        'sws_amount',
        'igst_rate',
        'igst_amount',        
        'compensation_cess',
        'safeguard_duty',
        'antidumping_duty',
        'addl_duty_1',
        'addl_duty_3',
        'addl_duty_5',
        'customs_duty',
        'nccd',
        'active'

    ];

}
