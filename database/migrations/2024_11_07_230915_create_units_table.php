<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('units', function (Blueprint $table) {
      $table->id();

      $table->string('description')
        ->nullable()
        ->comment('Descrição da unidade');

      $table->timestamps();

      // Indexes for query optimization
      $table->index('description', 'idx_units_description');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('units');
  }
};
