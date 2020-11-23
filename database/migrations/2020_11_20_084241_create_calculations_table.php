<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->index();
            $table->foreignId('user_id')->index();
            $table->string('name');
            $table->string('address');
            $table->string('zip_code');
            $table->string('city');
            $table->string('nip')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('invest_address');
            $table->string('invest_zip_code');
            $table->string('invest_city');
            $table->integer('consuption');
            $table->integer('pv_power');
            $table->foreignId('module_id');
            $table->string('module');
            $table->string('module_power');
            $table->integer('qty');
            $table->string('calc_power');
            $table->timestamps();
        });

        Schema::create('calculations_surcharges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calculation_id')->index()->constrained()->onDelete('cascade');
            $table->foreignId('surcharge_id')->index();
            $table->string('name');
            $table->decimal('price', 9, 2);
            $table->string('type')->default('module'); // module / once / kwp / unit
            $table->decimal('calc_price');
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
        Schema::dropIfExists('calculations');
    }
}
