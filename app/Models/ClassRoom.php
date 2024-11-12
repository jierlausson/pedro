<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClassRoom extends Model
{
  use HasFactory;

  protected $fillable = [
    'sub_activity_id',
    'unit_id',
    'description',
    'class',
    'weight',
    'max',
    'class_time',
    'day_month_year',
  ];

  public function sub_activity(): HasOne
  {
    return $this->hasOne(SubActivity::class);
  }

  public function unit(): BelongsTo
  {
    return $this->belongsTo(Unit::class);
  }
}
