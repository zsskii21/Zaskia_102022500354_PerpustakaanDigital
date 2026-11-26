<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * membuat tabel fasilitas_area
     */
    public function up(): void
    {
        Schema::create('fasilitas_area', function (Blueprint $table) {
             $table->id();
             $table->string('kode_area')->unique();
             $table->string('nama_area');
             $table->integer('nomor_lantai');
             $table->string('tipe');
             $table->boolean('stopkontak')->default(false);
             $table->boolean('wifi')->default(false);
             $table->string('status');
             $table->timestamps();
             });
    }

public function down(): void
    {
        Schema::dropIfExists('fasilitas_area');
    }
};
