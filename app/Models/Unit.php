<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
  use HasFactory;

  protected $fillable = [
    'description'
  ];

  public function class_room(): HasOne
  {
    return $this->hasOne(ClassRoom::class);
  }
}
