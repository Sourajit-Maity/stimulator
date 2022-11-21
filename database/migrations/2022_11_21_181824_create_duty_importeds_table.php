<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutyImportedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duty_importeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('overall_sale_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('subtype');
            $table->string('value');
            $table->string('bcd_rate')->nullable();
            $table->string('bcd_amount')->nullable();
            $table->string('addl_duty_1')->nullable();
            $table->string('addl_duty_3')->nullable();
            $table->string('addl_duty_5')->nullable();
            $table->string('customs_duty')->nullable();
            $table->string('nccd')->nullable();
            $table->string('sws_rate')->nullable();
            $table->string('sws_amount')->nullable();
            $table->string('igst_rate')->nullable();
            $table->string('igst_amount')->nullable();
            $table->string('compensation_cess')->nullable();
            $table->string('safeguard_duty')->nullable();
            $table->string('antidumping_duty')->nullable();
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('duty_importeds');
    }
}
