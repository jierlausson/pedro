<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubActivity extends Model
{
  use HasFactory;

  protected $fillable = [
    'activity_id',
    'description',
    'workload',
    'workload_max'
  ];

  public function activity(): HasOne
  {
    return $this->hasOne(Activity::class);
  }

  public function class_room(): BelongsTo
  {
    return $this->belongsTo(ClassRoom::class);
  }
}
