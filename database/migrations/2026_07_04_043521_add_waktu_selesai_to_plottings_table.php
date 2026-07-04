<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            $table->string('waktu_selesai')->nullable()->after('waktu_asesmen');
        });
    }

    public function down(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            $table->dropColumn('waktu_selesai');
        });
    }
};
