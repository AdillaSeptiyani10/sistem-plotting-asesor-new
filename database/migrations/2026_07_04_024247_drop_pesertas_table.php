<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pesertas');
        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jurusan');
            $table->timestamps();
        });
    }
};
