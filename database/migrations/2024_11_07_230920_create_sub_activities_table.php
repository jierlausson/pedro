<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('sub_activities', function (Blueprint $table) {
      $table->id();

      $table->foreignId('activity_id')
        ->nullable()
        ->constrained()
        ->onDelete('cascade');

      $table->string('description')
        ->nullable()
        ->comment('Descrição da sub-atividade');

      $table->unsignedInteger('workload')
        ->nullable()
        ->comment('Carga horária padrão');

      $table->unsignedInteger('workload_max')
        ->nullable()
        ->comment('Carga horária máxima permitida');

      $table->timestamps();

      // Indexes for query optimization
      $table->index('activity_id');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('sub_activities');
  }
};
