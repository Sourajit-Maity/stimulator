<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverallSales extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'hsn',
        'export_value',
        'sez_unit',
        'dta',
        'deemed_export',
        'taxability_under_gst',
        'air',
        'waste_scrap',        
        'rodtep',
        'air_receivable',
        'air_turnaround',
        'brand_rate',
        'air_amount',
        'rodtep_amount',
        'waste_scrap_amount',
        'sale_value_of_scrap',
    ];
}
