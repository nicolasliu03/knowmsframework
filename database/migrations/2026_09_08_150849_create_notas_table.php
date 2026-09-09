<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal', 45);
            $table->decimal('total', 12, 2)->default(0);

            $table->foreignId('pegawai_id')
                ->constrained('pegawais')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggans')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};