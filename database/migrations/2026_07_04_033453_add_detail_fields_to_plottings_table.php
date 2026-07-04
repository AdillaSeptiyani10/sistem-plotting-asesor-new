<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            // Rename kolom yang namanya berbeda
            if (Schema::hasColumn('plottings', 'approver_email')) {
                $table->renameColumn('approver_email', 'approver_h4');
            }
            if (Schema::hasColumn('plottings', 'spt_file')) {
                $table->renameColumn('spt_file', 'spt_h2');
            }
        });
    }

    public function down(): void
    {
        Schema::table('plottings', function (Blueprint $table) {
            if (Schema::hasColumn('plottings', 'approver_h4')) {
                $table->renameColumn('approver_h4', 'approver_email');
            }
            if (Schema::hasColumn('plottings', 'spt_h2')) {
                $table->renameColumn('spt_h2', 'spt_file');
            }
        });
    }
};
