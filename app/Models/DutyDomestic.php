<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DutyDomestic extends Model
{
    use HasFactory;
    protected $fillable = [
        'overall_sale_id',
        'type',
        'subtype',
        'value',
        'cgst_rate',
        'cgst_amount',
        'sgst_rate',
        'sgst_amount',
        'igst_rate',
        'igst_amount',        
        'compensation_cess',
        'customs_duty',
        'active'

    ];

}
