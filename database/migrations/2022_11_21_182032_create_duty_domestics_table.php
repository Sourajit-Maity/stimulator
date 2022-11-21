<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutyDomesticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duty_domestics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('overall_sale_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('subtype');
            $table->string('value');
            $table->string('cgst_rate')->nullable();
            $table->string('cgst_amount')->nullable();
            $table->string('sgst_rate')->nullable();
            $table->string('sgst_amount')->nullable();
            $table->string('igst_rate')->nullable();
            $table->string('igst_amount')->nullable();
            $table->string('compensation_cess')->nullable();
            $table->string('customs_duty')->nullable();
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
        Schema::dropIfExists('duty_domestics');
    }
}
