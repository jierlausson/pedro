<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubActivity extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'class_room_id',
    'description',
    'workload',
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
