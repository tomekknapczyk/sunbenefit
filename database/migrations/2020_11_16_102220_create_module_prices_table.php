<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_list_id')->index()->constrained()->onDelete('cascade');
            $table->decimal('price', 9, 2);
            $table->string('power');
            $table->integer('qty')->index();
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
        Schema::dropIfExists('module_prices');
    }
}
