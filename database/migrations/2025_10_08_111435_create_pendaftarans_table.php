<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id(); // ID auto-increment
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('hobi');
            $table->string('foto'); // Menyimpan path/nama file foto
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('nama_ayah');
            $table->string('asal_sekolah');
            $table->string('nik')->unique();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
