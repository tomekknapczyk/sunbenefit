<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationsTable extends Migration
{
    // Statusy:
    // 1. Umowa podpisana przez handlowca
    // 2. Umowa dostarczona do BOK
    // 3. Umowa zaakceptowana przez BOK
    // 4. Umowa „przekazana do Zamówienia”
    // 5. Potwierdzenie wysyłki towarów
    // 6. Towar dostarczono
    // 7. Montaż wykonany
    // 8. Zakończenie umowy
    // 9. Umowa do archiwum


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
            $table->integer('status')->default(1)->index();
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
            $table->boolean('company')->default(0);
            $table->boolean('same_place')->default(1);
            $table->decimal('pv_power', 9, 2);
            $table->decimal('deposit', 9, 2)->nullable();
            $table->integer('years')->nullable();
            $table->boolean('solar')->default(0);
            $table->decimal('options', 9, 2);
            $table->string('financing_method');
            $table->decimal('final_price', 9, 2);
            $table->string('final_power');
            $table->foreignId('module_id');
            $table->string('module_name');
            $table->string('module_power');
            $table->string('module_qty');
            $table->string('module_warranty');
            $table->json('calc_surcharges');
            $table->json('calc_surcharges_qty');
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
