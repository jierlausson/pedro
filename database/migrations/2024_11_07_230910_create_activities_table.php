<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('activities', function (Blueprint $table) {
      $table->id();

      $table->string('description')
        ->nullable()
        ->comment('Descrição da atividade');

      $table->unsignedInteger('workload_max')
        ->nullable()
        ->comment('Carga horária máxima permitida');

      $table->timestamps();

      // Indexes for query optimization
      $table->index('description', 'idx_activities_description');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('activities');
  }
};
