<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loctempatsampah', function (Blueprint $table) {
            $table->id();
            $table->string('namalokasi');
            $table->string('alamatlokasi');
            $table->string('jenislokasi');
            $table->string('luaslokasi');
            $table->string('kapasitaslokasi');
            $table->string('radiuslokasi');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('loctempatsampah');
    }
};
