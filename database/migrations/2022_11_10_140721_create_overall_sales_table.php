<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOverallSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overall_sales', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('description');
            $table->string('hsn');
            $table->string('export_value')->nullable();
            $table->string('sez_unit')->nullable();
            $table->string('dta')->nullable();
            $table->string('deemed_export')->nullable();
            $table->string('taxability_under_gst')->nullable();
            $table->string('air')->nullable();
            $table->string('waste_scrap')->nullable();
            $table->string('rodtep')->nullable();
            $table->string('air_receivable')->nullable();
            $table->string('air_turnaround')->nullable();
            $table->string('brand_rate')->nullable();
            $table->string('air_amount')->nullable();
            $table->string('rodtep_amount')->nullable();
            $table->string('waste_scrap_amount')->nullable();
            $table->string('sale_value_of_scrap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overall_sales');
    }
}
