<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan', 100);
            $table->date('tanggal');
            $table->time('jam');
            $table->unsignedTinyInteger('jumlah_orang');
            $table->string('status', 30)->default('Menunggu');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('reservasis'); }
};
