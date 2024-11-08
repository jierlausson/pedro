<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'sub_activity_id',
    'description',
    'workload_max',
  ];

  public function sub_activity(): BelongsTo
  {
    return $this->belongsTo(SubActivity::class);
  }
}
