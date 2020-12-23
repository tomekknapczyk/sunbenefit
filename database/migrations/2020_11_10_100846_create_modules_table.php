<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('warranty')->nullable();
            $table->string('file_name')->nullable();
            $table->text('description')->nullable();
            $table->integer('power');
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('frame')->nullable();
            $table->decimal('efficiency', 9, 2)->nullable();
            $table->decimal('performance', 9, 2)->nullable();
            $table->decimal('pmax', 9, 2)->nullable();
            $table->decimal('mpower', 9, 2)->nullable();
            $table->decimal('area', 9, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
