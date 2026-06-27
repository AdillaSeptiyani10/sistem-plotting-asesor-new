<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('plottings', function (Blueprint $table) {
        $table->id();

        $table->foreignId('asesor_id')
              ->constrained()
              ->onDelete('cascade');

        $table->foreignId('peserta_id')
              ->constrained()
              ->onDelete('cascade');

        $table->date('tanggal');
        $table->string('lokasi');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plottings');
    }
};
