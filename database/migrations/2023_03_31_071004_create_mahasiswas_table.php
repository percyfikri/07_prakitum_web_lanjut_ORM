<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->integer('Nim')->primary();          
            $table->string('Nama', 20);
            $table->string('Kelas', 20);
            $table->string('Jurusan', 20);
            $table->bigInteger('No_Handphone');
            $table->string('Email',20);
            $table->date('TanggalLahir', 20);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
