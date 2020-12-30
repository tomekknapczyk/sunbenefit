<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calculation_id')->index()->constrained()->onDelete('cascade');
            $table->json('location')->nullable();
            $table->string('azimuth')->nullable();
            $table->json('status')->nullable();
            $table->json('roof')->nullable();
            $table->string('roofManufacturer')->nullable();
            $table->string('rootAdditionalNotes')->nullable();
            $table->json('roofType')->nullable();
            $table->json('construction')->nullable();
            $table->json('constructionMaterial')->nullable();
            $table->json('constructionGround')->nullable();
            $table->string('constructionAdditionalNotes')->nullable();
            $table->json('constructionRoofType')->nullable();
            $table->string('buildingHeight')->nullable();
            $table->string('buildingHeight2')->nullable();
            $table->string('buildingRoofLength')->nullable();
            $table->string('buildingRoofLength2')->nullable();
            $table->string('buildingTopLength')->nullable();
            $table->string('buildingRoofAngle')->nullable();
            $table->string('buildingWidth')->nullable();
            $table->string('buildingLength')->nullable();
            $table->string('counterNr')->nullable();
            $table->string('counterLocation')->nullable();
            $table->string('ppe1')->nullable();
            $table->string('groundWidth')->nullable();
            $table->string('groundLength')->nullable();
            $table->boolean('piercing')->default(0);
            $table->string('piercingLength')->nullable();
            $table->string('groundAdditionalNotes')->nullable();
            $table->json('connection')->nullable();
            $table->json('connectionType')->nullable();
            $table->string('connectionPower')->nullable();
            $table->json('pvType')->nullable();
            $table->json('protection')->nullable();
            $table->string('fuse')->nullable();
            $table->json('lightning')->nullable();
            $table->string('connectionAdditionalNotes')->nullable();
            $table->json('insulation')->nullable();
            $table->string('insulationSize')->nullable();
            $table->string('pvPower')->nullable();
            $table->json('inverter')->nullable();
            $table->string('inverterAdditionalNotes')->nullable();
            $table->string('additionalNotes')->nullable();
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
        Schema::dropIfExists('aums');
    }
}
