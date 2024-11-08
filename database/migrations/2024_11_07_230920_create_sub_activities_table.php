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
      $table->foreignId('class_room_id')->nullable()->constrained();
      $table->string('description')->nullable();
      $table->integer('workload')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('sub_activities');
  }
};
