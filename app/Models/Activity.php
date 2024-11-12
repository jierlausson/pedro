<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
  use HasFactory;

  protected $fillable = [
    'description',
    'workload_max',
  ];

  public function sub_activity(): BelongsTo
  {
    return $this->belongsTo(SubActivity::class);
  }
}
