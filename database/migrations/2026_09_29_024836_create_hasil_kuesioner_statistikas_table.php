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
        Schema::create('hasil_kuesioner_statistikas', function (Blueprint $table) {
            $table->id();
            $table->string('namalengkap');
            $table->enum('status', ['bekerja', 'belum', 'kuliah']);
            $table->string('pekerjaan')->nullable();
            $table->string('tempat_bekerja')->nullable();
            $table->unsignedBigInteger('pendapatan')->nullable();
            $table->string('tempat_kuliah')->nullable();
            $table->string('bukti')->nullable();
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
        Schema::dropIfExists('hasil_kuesioner_statistikas');
    }
};
