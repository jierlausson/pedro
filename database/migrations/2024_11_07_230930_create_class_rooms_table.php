<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('class_rooms', function (Blueprint $table) {
      $table->id();

      $table->foreignId('sub_activity_id')
        ->nullable()
        ->constrained()
        ->onDelete('cascade');

      $table->foreignId('unit_id')
        ->nullable()
        ->constrained()
        ->onDelete('cascade');

      $table->string('description')
        ->nullable()
        ->comment('Descrição da sala de aula');

      $table->decimal('weight', 4, 2)
        ->nullable()
        ->comment('Peso da atividade');

      $table->unsignedInteger('max')
        ->nullable()
        ->comment('Número máximo de alunos');

      $table->string('class')
        ->nullable()
        ->comment('Identificador da turma');

      $table->unsignedInteger('class_time')
        ->nullable()
        ->comment('Duração da aula em minutos');

      $table->dateTime('day_month_year')
        ->nullable()
        ->comment('Data e hora da aula');

      $table->timestamps();

      // Índices para otimização de consultas
      $table->index(['sub_activity_id', 'unit_id']);
      $table->index('day_month_year');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('class_rooms');
  }
};
