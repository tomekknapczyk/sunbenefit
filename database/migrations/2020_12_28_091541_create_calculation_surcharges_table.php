<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationSurchargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculation_surcharges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calculation_id')->index()->constrained()->onDelete('cascade');
            $table->foreignId('surcharge_id');
            $table->string('name');
            $table->string('type');
            $table->integer('qty');
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
        Schema::dropIfExists('calculation_surcharges');
    }
}
