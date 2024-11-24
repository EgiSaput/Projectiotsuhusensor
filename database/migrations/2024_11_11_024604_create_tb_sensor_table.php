<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();                         // Kolom ID sebagai Primary Key
            $table->decimal('suhu', 10, 2);       // Kolom suhu dengan tipe decimal(10, 2)
            $table->decimal('kelembaban', 10, 2);        // Kolom kelembaban dengan tipe integer
            $table->timestamps();                 // Kolom created_at dan updated_at dengan tipe timestamp
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
};