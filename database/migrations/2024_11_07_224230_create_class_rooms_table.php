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
      $table->string('description')->nullable();
      $table->string('unit')->nullable();
      $table->string('class')->nullable();
      $table->integer('weight')->nullable();
      $table->integer('max')->nullable();
      $table->integer('class_time')->nullable();
      $table->dateTime('day_month_year')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('class_rooms');
  }
};
