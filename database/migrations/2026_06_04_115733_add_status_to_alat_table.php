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
    Schema::table('alat', function (Blueprint $table) {
        // Menambahkan kolom status dengan nilai bawaan 'Siap Pakai'
        $table->string('status')->default('Siap Pakai')->after('lokasi');
    });
}

public function down(): void
{
    Schema::table('alat', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
