<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nota_barangs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('barang_id')
                ->constrained('barangs')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('nota_id')
                ->constrained('notas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->integer('jumlah');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nota_barangs');
    }
};