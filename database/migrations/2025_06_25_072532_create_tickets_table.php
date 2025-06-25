<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_name');
            $table->string('movie_title');
            $table->string('studio');
            $table->date('tanggal_tayang');
            $table->string('seat_number');
            $table->float('harga_tiket'); 
            $table->string('kode_booking');
            $table->string('hari_tayang');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};